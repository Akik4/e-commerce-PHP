<?php

global $data;
include_once "menu.php";

?>
<div class="wrapper">

    <div class="input">
        <a href="categories.form.php?id=0">ADD</a>
    </div>
    <div class="list">
        <div class="list-container">
            <table>
                <thead>
                <tr>
                    <th></th><th>Id</th><th>Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data->getRows("categories") as $user){ ?>
                <tr>
                    <td><a href="/admin/categories.form.php?&id=<?=$user['id']?>">E </a><a href="/admin/action/remove.php?type=categories&id=<?=$user['id']?>">X</a></td>
                    <td><?= $user['id'];?></td>
                    <td><?= $user['name'];?></td>

                    <?php }?>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>
</body>
</html>