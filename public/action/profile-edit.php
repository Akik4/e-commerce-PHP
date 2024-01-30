<?php

include_once "../../src/utils.php";

global $data;

if(isset($_POST['value']) |
    isset($_POST['password']) |
    isset($_GET['item'])
)
{
    $item = $_GET['item'];
    $value = $_POST['value'];
    if($_GET['item'] == "Username") {
        $item = "name";
        $_SESSION['name'] = $value;
    }
    if($item == "Password")
    {
        $value = hash("sha256", $_POST['value']);
    }
    $password = hash("sha256", $_POST['password']);

    $data->updateUser($password, $item, $value, $_SESSION['id']);
}
header("Location: ../profile.php?id=". $_SESSION["id"]);