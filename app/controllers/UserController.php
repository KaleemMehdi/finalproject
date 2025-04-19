<?php

namespace app\controllers;
use app\models\User;

//this is an example controller class, feel free to delete
class UserController extends Controller {
    public function getAllAttorneys() {
        $attorneyModel = new User();
        $attorneys = $attorneyModel->getAllAttorneys();
        $this->returnJSON($attorneys);
    }

    public function contactsView() {
        $this->returnView('./assets/views/main/contacts.html');
    }

    public function attorneysView() {
        $this->returnView('./assets/views/main/attorneys.html');
    }

    public function validateContact($inputData) {
        $errors = [];
        $firstName = $inputData['firstName'];
        $lastName = $inputData['lastName'];
        $email = $inputData['email'];
        $phoneNumber = $inputData['phoneNumber'];
        $message = $inputData['message'];

        if ($firstName) {
            $firstName = htmlspecialchars($firstName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($firstName) < 2) {
                $errors['firstNameShort'] = 'first name is too short';
            }
        } else {
            $errors['requiredFirstName'] = 'first name is required';
        }

        if ($lastName) {
            $lastName = htmlspecialchars($lastName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($lastName) < 2) {
                $errors['lastNameShort'] = 'last name is too short';
            }
        } else {
            $errors['requiredLastName'] = 'last name is required';
        }

        if ($email) {
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex, $email)) {
                $errors['invalidEmail'] = 'email is invalid.';
            }
        } else {
            $errors['requiredEmail'] = 'email is required';
        }

        if ($phoneNumber) {
            $phoneNumber = htmlspecialchars($phoneNumber, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($phoneNumber) < 10) {
                $errors['phoneNumberShort'] = 'phone number is too short';
            }
        } else {
            $errors['requiredPhoneNumber'] = 'phone number is required';
        }

        if ($message) {
            $message = htmlspecialchars($message, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($message) < 10) {
                $errors['messageShort'] = 'message is too short';
            }
        } else {
            $errors['requiredMessage'] = 'message is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'message' => $message,
        ];
    }

    public function saveContact() {
        $inputData = [
            'firstName' => $_POST['firstName'] ?: null,
            'lastName' => $_POST['lastName'] ?: null,
            'email' => $_POST['email'] ?: null,
            'phoneNumber' => $_POST['phoneNumber'] ?: null,
            'message' => $_POST['message'] ?: null,
        ];

        $contactData = $this->validateContact($inputData);

        $contact = new User();
        $contact->saveContact(
            [
                'firstName' => $contactData['firstName'],
                'lastName' => $contactData['lastName'],
                'email' => $contactData['email'],
                'phoneNumber' => $contactData['phoneNumber'],
                'message' => $contactData['message'],

            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

}