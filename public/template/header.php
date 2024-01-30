<?php

include_once "../src/utils.php";

$isConnected = false;
if (isset($_SESSION["id"])){
    $isConnected = true;
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
    <link rel="stylesheet" href="./template/header.css">
</head>
<body>
<div id="page">
    <div class="test">
        <header>
            <H1>Bienvenue</H1>
            <div>
                <?php
                if(!$isConnected):
                    ?>
                    <a href="register.php">register</a>
                    <a href="login.php">login</a>

                <?php
                else:
                    ?>
                    <a href="profile.php?id=<?= $_SESSION['id']?>"><?= $_SESSION['name'] ?></a>
                <?php
                endif;
                ?>
            </div>
        </header>
