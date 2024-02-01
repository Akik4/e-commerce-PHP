<?php

include_once "../../src/utils.php";
global $data;

if(isset($_POST['mail']) &&($_POST['password'])){
    $user = $data->isExistingUser($_POST['mail'], $_POST['password']);
    if(count($user) > 0){
        $_SESSION["id"]=$user['id'];
        $_SESSION['name']=$user['name'];
        header('Location: /index.php');
    } else
    {
        header('Location: ../login.php?error=1');
    }

} else {
    header('Location: ../login.php?error=1');
}