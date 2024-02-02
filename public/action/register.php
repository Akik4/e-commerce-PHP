<?php

include_once "../../src/utils.php";

global $data;

if(isset($_POST['mail']) |
isset($_POST['username']) |
isset($_POST['password']) |
isset($_POST['password_verify']))
{
    if($_POST['password'] == $_POST['password_verify'])
    {
        $password = hash("sha256", $_POST['password']);
        $data->insert("users", ['email', 'name' ,'role', 'password'], [$_POST['mail'], $_POST['username'], 1, $password]);

        header('Location: ../index.php');
    } else {
        header('Location: ../register.php?error=1');
    }
} else {
    header('Location: ../register.php?error=1');
}