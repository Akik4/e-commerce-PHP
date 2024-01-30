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

    <form action="./action/login.php" class="register-form" METHOD="POST">
        <h1>LOGIN</h1>
        <input type="text" name="mail" placeholder="mail" required>
        <input type="password" name="password" placeholder="password" required>
        <input id="submit" type="submit" value="submit">

    </form>


</body>
</html>


