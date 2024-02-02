<?php

include_once "../../src/utils.php";

global $data;

if(empty($_SESSION['id']))
{
    header("Location: /index.php");
} else {
    if (isset($_POST['value']) |
        isset($_POST['password']) |
        isset($_GET['item'])
    ) {
        $item = $_GET['item'];
        $value = $_POST['value'];
        if ($_GET['item'] == "Username") {
            $item = "name";
            $_SESSION['name'] = $value;
        }
        if ($item == "Password") {
            $value = hash("sha256", $_POST['value']);
        }
        $password = hash("sha256", $_POST['password']);

        $data_user = $data->getItem('users', $_SESSION['id']);

        if ($password == $data_user['password']) {
            $data->update("users", [$item], [$value, $_SESSION['id'], $password], ['id', 'password']);
            header("Location: /profile.php?id=" . $_SESSION["id"]);
        } else {
            echo $password . "<br>";
            echo $data_user['password'];
            header("Location: /profile.edit.php?item=Password&id=" . $_SESSION["id"]);

        }

    }
}
