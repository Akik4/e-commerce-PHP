<?php

global $data;
include_once "menu.php";

?>
<div class="wrapper">

    <div class="input">
        <a href="user.form.php">ADD</a>
    </div>
    <div class="list">
        <div class="list-container">
            <table>
                <thead>
                <tr>
                    <th></th><th>Id</th><th>Name</th><th>email</th><th>role</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data->getRows("users") as $user){ ?>
                <tr>
                    <td><a href="/admin/user.form.php?id=<?=$user['id']?>">E </a><a href="/admin/action/remove.php?type=users&id=<?=$user['id']?>">X</a></td>
                    <td><?= $user['id'];?></td>
                    <td><?= $user['name'];?></td>
                    <td><?= $user['email'];?></td>
                    <td><?php
                        $name = $data->linkTable("roles.name", "users", "roles", "t1.role", "roles.id", $user['id']);
                        echo $name[0]['name'];

                        }?></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>
</body>
</html>