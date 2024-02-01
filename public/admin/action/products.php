<?php

global $data;
include_once str_replace("public/admin/action","src",__DIR__) . "/utils.php";

if(isset($_POST['name_product']) &&
    isset($_POST['description']) &&
    isset($_POST['stock']) &&
    isset($_POST['price']) &&
    isset($_POST['status']) &&
    isset($_POST['category']))
{
    $data->insert("products",
        ["name", "description", "price", "stock", "category","status",],
        [$_POST['name_product'], $_POST['description'], $_POST['price'],
            $_POST['stock'],  $_POST['category'], $_POST['status']]);

    header("Location: /admin/products.php");
} else {
    header('Location: ../register.php?error=1');
}
