<?php
include 'App/Model/UserModel.php';
include 'App/Views/users/index.php';

class UserController {
    private $userModel;
    private $userView;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->userView = new UserView();
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $userInfo = $this->userModel->getUserByEmail($email);
            $this->userView->showUserInfo($userInfo);
        }

        $this->userView->showSearchForm();
    }
}