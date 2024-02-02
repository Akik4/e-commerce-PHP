<?php

include_once "../../src/utils.php";
global $data;


if(empty($_SESSION['id']))
{
    header("Location: /index.php");
} else {

        if(isset($_GET['id']))
        {
            $data->insert("products_cart", ["cart_id", "product_id"], [$_SESSION['id'], $_GET['id']]);
            header("Location: /index.php");
        }
}
