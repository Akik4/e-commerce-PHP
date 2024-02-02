<?php

global $data;
include_once str_replace("public/admin/action","src",__DIR__) . "/utils.php";

if(isset($_SESSION['id'])) {
    $user = $data->getItem('users', $_SESSION['id']);
    if ($user['role'] == 2) {
        if (isset($_GET['id'])) {
            if ($_GET['id'] <= 0) {
                if (isset($_POST['mail']) &&
                    isset($_POST['username']) &&
                    isset($_POST['password']) &&
                    isset($_POST['role'])) {

                    $password = hash("sha256", $_POST['password']);
                    $data->insert("users", ['email', 'name', 'role', 'password'], [$_POST['mail'], $_POST['username'], $_POST['role'], $password]);
                    header('Location: /admin/users.php');
                } else {
                    //            header('Location: ../register.php?error=1');
                }
            } else {
                if (isset($_POST['mail']) &&
                    isset($_POST['username']) &&
                    isset($_POST['role'])) {

                    if (isset($_POST['password'])) {
                        $password = hash("sha256", $_POST['password']);
                        $data->update("users", ['email', 'name', 'role', 'password'], [$_POST['mail'], $_POST['username'], $_POST['role'], $password, $_GET['id']], ['id']);
                    } else {
                        $data->update("users", ['email', 'name', 'role'], [$_POST['mail'], $_POST['username'], $_POST['role'], $_GET['id']], ['id']);
                    }
                    header('Location: /admin/users.php');

                } else {
                    header('Location: ../error.php');
                }
            }
        }
    }
}