<?php

require_once("../../src/Db.php");
include_once("../../src/session.php");

use Utils\database\Db;

$data = new Db();
$data->connect();


if (isset($_POST['username'])) {
    if (isset($_POST['password'])) {
        $password = hash('sha256', $_POST['password']);
        if ($data->get_user($_POST['username'], $password)) {
            $_SESSION['user'] = $_POST['username'];
            $_SESSION['id'] = $data->get_userId($_SESSION['user']);
            header('Location: ../view/index.php');
        } else {
            header('Location: ../view/login.php?error=1');

        }
    } else {
        header('Location: ../view/login.php?error=2');

    }
} else {
    header('Location: ../view/login.php?error=3');
}



