<?php

include_once "../../src/utils.php";
global $data;

if(empty($_SESSION['id']))
{
    header("Location: /index.php");
}

else {

        if (isset($_GET['id'])) {
            $data->remove("products_cart", $_GET['id']);
            header("Location: /profile.php?id=" . $_SESSION['id']);
        }
}

