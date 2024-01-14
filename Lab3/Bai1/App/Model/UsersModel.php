<?php
namespace App\Model;

use App\Core\Model;

class UsersModel extends Model
{
    public function tableFill()
    {
        return 'users';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id';
    }

    public function insertUser($data)
    {
        $inserted = $this->table('users')->insert($data);
        return null;
    }

    public function getUserById()
    {
        $user = $this->table('users')->where('id', '=', $this->lastInsertId())->first();
        return $user;
    }
}