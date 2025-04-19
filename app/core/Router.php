<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\UserController;

class Router {
    public $uriArray;

    function __construct() {
        $this->uriArray = $this->routeSplit();
        $this->handleMainRoutes();
        $this->handleUserRoutes();
    }

    protected function routeSplit() {
        $removeQueryParams = strtok($_SERVER["REQUEST_URI"], '?');
        return explode("/", $removeQueryParams);
    }

    protected function handleMainRoutes() {
        if ($this->uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController = new MainController();
            $mainController->homepage();
        }
    }

    protected function handleUserRoutes() {
        if ($this->uriArray[1] === 'contacts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->contactsView();
        }

        if ($this->uriArray[1] === 'attorneys' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->attorneysView();
        }

        if ($this->uriArray[1] === 'contacts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController = new UserController();
            $userController->saveContact();
        }

        if ($this->uriArray[1] === 'api' && $this->uriArray[2] === 'attorneys' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->getAllAttorneys();
        }

    }
}
