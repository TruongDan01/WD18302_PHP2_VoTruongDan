<?php
namespace App\Controllers;

use App\Model\UsersModel;

class UserController
{
    public function getUserById($userId)
    {
        $usersModel = new UsersModel();
        $user = $usersModel->getUserById($userId);

        if ($user) {
            echo "Người dùng có ID $userId:";
            echo $user['name'] . ', ' . $user['email'];
        } else {
            echo "Không tìm thấy người dùng với ID $userId.";
        }
    }
}