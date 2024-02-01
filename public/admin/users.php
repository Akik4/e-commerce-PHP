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
                    <th>Id</th><th>Name</th><th>email</th><th>role</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data->getRows("users") as $user){ ?>
                <tr>
                    <td><?= $user['id'];?></td>
                    <td><?= $user['name'];?></td>
                    <td><?= $user['email'];?></td>
                    <td><?php if($user['role'] == 1){
                        echo 'admin';
                        } else {
                        echo 'user';
                    }
                        }?></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>
</body>
</html>