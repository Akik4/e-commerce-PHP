<?php

global $data;
include_once "menu.php";

?>
<div class="wrapper">

    <div class="input">
        <a href="categories.form.php">ADD</a>
    </div>
    <div class="list">
        <div class="list-container">
            <table>
                <thead>
                <tr>
                    <th>Id</th><th>Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data->getRows("categories") as $user){ ?>
                <tr>
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