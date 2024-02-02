<?php
include_once "../../src/utils.php";

if(empty($_SESSION['id']))
{
    header("Location: /index.php");
} else {
    session_unset();
    session_destroy();

    header('Location: /index.php');
}
