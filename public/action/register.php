<?php
require_once("../../src/Db.php");
include_once("../../src/session.php");

use Utils\database\Db;

$data = new Db();
$data->connect();

if (isset($_POST['username'])) {
    if (isset($_POST['password'])) {
        $password = hash('sha256', $_POST['password']);
        $data->insert_user($_POST['username'], $password);
       // header("Location: login.php");
        echo "user created";
    } else {
        //header("Location: register.php");
        echo "missing password :(";
    }
} else {
    //header("Location: register.php");
    echo "Missing username :(";
}
