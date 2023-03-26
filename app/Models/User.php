<?php

namespace App\Models;

use PDO;

class User extends Models
{
    public function createUser(array $data)
    {
        $password = hash('sha256',$data['password']);
        $role = $this->getRoleByName('user');
        $stmt = $this->database->prepare('INSERT INTO user (name, phone, email, password, role_id) VALUES (:name, :phone, :email, :password, :role_id)');

        $name =  $data['first_name'] . " " . $data['last_name'];
        $stmt->bindParam('name',$name, PDO::PARAM_STR);
        $stmt->bindParam('phone',$data['phone'], PDO::PARAM_STR);
        $stmt->bindParam('email',$data['email'], PDO::PARAM_STR);
        $stmt->bindParam('password',$password, PDO::PARAM_STR);
        $stmt->bindParam('role_id',$role['id'], PDO::PARAM_STR);

        $stmt->execute();
        $s = $this->database->lastInsertId();
        //$stmt->fetch(PDO::FETCH_ASSOC)
        return $s;
    }

    public function getRoleByName(string $name)
    {
        $stmt = $this->database->prepare("SELECT * FROM role WHERE name = '{$name}'");

        $stmt->execute();

        $role = $stmt->fetch(2);

        if($role == false)
        {
            return null;
        }

        return $role;
    }

    public function getRoleByUserId($user_id)
    {
        $stmt = $this->database->prepare("SELECT role.name FROM user JOIN role ON role_id = role.id
                                               WHERE user.id = '{$user_id}'");
        $stmt->execute();

        $role = $stmt->fetch(2);

        if($role == false)
        {
            return null;
        }

        return $role['name'];
    }

    public function getUserById($user_id)
    {
        $stmt = $this->database->prepare("SELECT * FROM user WHERE id = '{$user_id}'");

        $stmt->execute();

        $user = $stmt->fetch(2);

        if($user == false)
        {
            return null;
        }

        return $user;
    }
}