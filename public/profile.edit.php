<?php

include_once './template/header.php';

$edit_item = "";
$type = "text";

if(isset($_GET['item']))
{
        $edit_item = $_GET['item'];
        if($edit_item == "Password")
        {
            $type = "password";
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
</head>
<body>
    <div id="page-content-form">
        <form action="./action/profile-edit.php?item=<?= $_GET['item']?>" class="register-form" METHOD="POST">
            <h1>EDIT <?= $edit_item ?></h1>
            <input type="<?= $type?>" name="value" placeholder="<?= $edit_item ?>" required>
            <input type="password" name="password" placeholder="Current password" required>
            <input id="submit" type="submit" value="submit">

        </form>

    </div>


</body>
</html>