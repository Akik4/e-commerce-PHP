<?php

global $data;
include_once str_replace("public/admin/action","src",__DIR__) . "/utils.php";

if(isset($_POST['mail']) &&
    isset($_POST['name'])&&
    isset($_POST['password'])&&
    isset($_POST['role'])){

        $password = hash("sha256", $_POST['password']);
        $data->insert("users", ['email', 'name' ,'role', 'password'], [$_POST['mail'], $_POST['username'], $_POST['role'], $password]);
        header('Location: /admin/users.php');
} else {
    header('Location: ../register.php?error=1');
}