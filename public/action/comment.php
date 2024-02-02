<?php

include_once "../../src/utils.php";
global $data;

if(empty($_SESSION['id']))
{
    header("Location: /index.php");
} else {
    if (isset($_POST['comment'])) {
        $data->insert("comment", ['user_id', 'product_id', 'text', 'star'], [$_SESSION['id'], $_GET['id'], $_POST['comment'], $_POST['star']]);
        $data->updateComments($_GET['id']);
        header("Location: ../details.php?id=$_GET[id]");
    } else {
        header('Location: ../index.php?error=1');
    }
}