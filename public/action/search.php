<?php

include_once '../template/header.php';
include_once "../../src/utils.php";

global $data;
if(isset($_POST['search_bar'])){
    $data->searching($_POST['search_bar']);
    header('Location: ../index.php');
}else {
    header('Location: ../index.php?error=1');
}


?>