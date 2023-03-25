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

        return $stmt->fetch(PDO::FETCH_ASSOC);
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
}