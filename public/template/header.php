<?php

global $data;
include_once str_replace("public", "src", $_SERVER['DOCUMENT_ROOT'])  ."/utils.php";

$isConnected = false;
$admin = false;
if (isset($_SESSION["id"])){
    $isConnected = true;
    $user = $data->getUser($_SESSION['id']);
    if($user['role'] == 2)
    {
        $admin = true;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/template/header.css">
</head>
<body>
<div id="page">
    <div class="all-page">
        <header>
            <div id="nav-menu">
                <H1>Welcome</H1>
                <a href="/index.php">Home</a>
            </div>
            <div id="user-nav">
                <?php
                if(!$isConnected):
                    ?>
                    <a href="register.php">register</a>
                    <a href="login.php">login</a>

                <?php
                else:
                    ?>
                    <a href="/profile.php?id=<?= $_SESSION['id']?>"><?= $_SESSION['name'] ?></a>
                    <?php
                        if($admin):
                    ?>
                    <a href="/admin/menu.php"> <img src="https://cdn.icon-icons.com/icons2/2107/PNG/512/file_type_light_config_icon_130470.png" height="50px" width="50px"> </a>
                <?php
                        endif;
                endif;
                ?>
            </div>
        </header>
