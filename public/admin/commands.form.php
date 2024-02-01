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
        $product = $data->getItem("commands", $_GET['id']);

        $name = $product['status'];
    }
}
?>

<div class="wrapper">
    <form class="user-form" action="/admin/action/commands.php?id=<?= $_GET['id']?>" method="POST">
        <div class="label">
            <label for="">Status</label>
            <input type="text" name="status" value="<?= $name?>">
        </div>
        <div class="label">
            <input type="submit" value="add">
        </div>
    </form>
</div>
</body>
</html>
