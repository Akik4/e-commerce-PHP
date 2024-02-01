<?php

include_once str_replace("public/admin","src",__DIR__) . "/utils.php";
global $data;

if(empty($_SESSION['id']))
{
    header('Location: /index.php');
}
$user = $data->getItem('users', $_SESSION['id']);
if($user['role'] != 2)
{
    header('Location: /index.php');
}
    include_once "../template/header.php";




?>

<div id="page-admin">
    <div class="menu">
        <h1> Menu </h1>
        <div class="menu-item">
            <a href="users.php"> utilisateur</a>
            <a href="products.php"> produits </a>
            <a href="commands.php"> commandes </a>
            <a href="categories.php">category</a>
        </div>
    </div>



