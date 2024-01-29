<?php
include_once("../../src/session.php");

$error_message = "";
if(isset($_GET['error']))
{
    if($_GET['error'] = 1)
    {
        $error_message = "Unknown username or password";
    } else if($_GET['error'] = 2)
    {
        $error_message = "Please provide a password";
    }else if($_GET['error'] = 3)
    {
        $error_message = "Please provide a username";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <a href="index.php">Accueil</a>
    <form action="../action/login.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Register">
        <p><?= $error_message ?></p>
    </form>
</body>
</html>