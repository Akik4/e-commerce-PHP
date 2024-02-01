<?php
include_once "menu.php";
?>

<div class="wrapper">
    <form class="user-form" action="/admin/action/user.php" method="POST">
        <div class="label">
            <label for="">Username</label>
            <input type="text" name="username">
        </div>
        <div class="label">
            <label for="">Email</label>
            <input type="text" name="mail">
        </div>
        <div class="label">
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div class="label">
            <label for="">role</label>
            <select name="role" id="">
                <option value="">1</option>
                <option value="">2</option>
            </select>
        </div>
        <div class="label">
            <input type="submit" value="add">
        </div>
    </form>
</div>
</body>
</html>
