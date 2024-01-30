<?php

namespace utils\poo;

use PDO;
use PDOException;

class Database
{
    public function connect()
    {
        global $PDO;
        $dsn = "mysql:host=mariadb;dbname=website";

        try {
            $PDO = new PDO($dsn, "root", "root");
        } catch(PDOException $e) {
            echo "Connection failed";
        }
    }

    public function insert_user($username, $email, $password)
    {
        global $PDO;

        $request = $PDO->prepare("INSERT INTO users(name, email, role, password) VALUE (:username, :email, 1, :password)");
        $request->execute([":username" => $username, ":email" => $email, ":password" => hash("sha256", $password)]);
    }

    public function isExistingUser($email, $password) : array
    {
        global $PDO;

        $request = $PDO->prepare("Select * from users where email=:email and password=:password");
        $request->execute([":email" => $email, ":password" => hash("sha256", $password)]);
        if($request->rowCount() == 0)
        {
            return [];
        }
        return $request->fetch();
    }

    public function getUser($id)
    {
        global $PDO;

        $request = $PDO->prepare("Select *, roles.name as rolename, users.name as username from users JOIN roles ON role=roles.id WHERE users.id=:id");
        $request->execute([":id" => $id]);
        if($request->rowCount() == 0)
        {
            return [];
        }
        return $request->fetch();
    }

    public function updateUser($password, $item, $value, $id)
    {
        global $PDO;

        $request = $PDO->prepare("UPDATE users set $item=:value where id=:id and password=:password");
        $request->execute([":value" => $value, ":id" => $id, ":password" =>$password]);
    }
}