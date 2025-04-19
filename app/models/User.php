<?php

namespace app\models;

//this is an example model class, feel free to delete
class User extends Model {

    public function getAllAttorneys() {
        $query = "select * from attorneys";
        return $this->query($query);
    }

    public function saveContact($inputData){
        $query = "insert into contacts (firstName, lastName, email, phoneNumber, message) values (:firstName, :lastName, :email, :phoneNumber, :message);";
        return $this->query($query, $inputData);
    }
}