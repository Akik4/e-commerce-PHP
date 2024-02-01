<?php

include_once "../../src/utils.php";
global $data;

if(isset($_POST['comment'])){
    $data->insert("comment", ['user_id', 'product_id' ,'text', 'star'],[$_SESSION['id'], $_GET['id'], $_POST['comment'], $_POST['star']]);
    header("Location: ../details.php?id=$_GET[id]");
} else {
    header('Location: ../index.php?error=1');
}