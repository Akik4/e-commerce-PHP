<?php

include_once "../../src/utils.php";

global $data;

if(isset($_POST['mail']) |
isset($_POST['username']) |
isset($_POST['password']) |
isset($_POST['password_verify']))
{
    $data->insert_user($_POST['username'], $_POST['mail'], $_POST['password']);
    header('Location: ../index.php');

} else {
    header('Location: ../register.php?error=1');
}