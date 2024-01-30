<?php

include_once "../src/utils.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    <form action="./action/register.php" class="register-form" METHOD="POST">
        <h1>REGISTER</h1>
        <input type="text" name="mail" placeholder="Mail..." required>
        <input type="text" name="username" placeholder="Username..." required>
        <input type="password" name="password" placeholder="Password..." required>
        <input type="password" name="password_verify" placeholder="Verify password..." required>
        <input id="submit" type="submit" value="Submit">
    </form>
</body>
</html>