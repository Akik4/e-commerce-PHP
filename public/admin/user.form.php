<?php
global $data;
include_once "menu.php";

if(isset($_GET['id']))
{
    $name = "";
    $mail = "";
    $role = "";
    $cart = "";
    if($_GET['id'] > 0) {
        $product = $data->getItem("users", $_GET['id']);

        $name = $product['name'];
        $mail = $product['email'];
        $role = $product['role'];
    }
}
?>

<div class="wrapper">
    <form class="user-form" action="/admin/action/user.php?id=<?= $_GET['id']?>" method="POST">
        <div class="label">
            <label for="">Username</label>
            <input type="text" name="username" value="<?= $name?>">
        </div>
        <div class="label">
            <label for="">Email</label>
            <input type="text" name="mail" value="<?= $mail?>">
        </div>
        <div class="label">
            <label for="">Password</label>
            <input type="password" name="password" value="<?php ?>">
        </div>
        <div class="label">
            <label for="">role</label>
            <select name="role" id="" value="<?= $role?>">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
        <div class="label">
            <input type="submit" value="add">
        </div>
    </form>
</div>
</body>
</html>
