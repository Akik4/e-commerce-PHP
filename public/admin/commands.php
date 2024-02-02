<?php

global $data;
include_once "menu.php";

$str_order = "ASC";
if(isset($_GET['orderby']))
{
    if($_GET['orderby'] == "DESC")
    {
        $str_order = "ASC";
    } else {
        $str_order = "DESC";
    }
}
?>
<div class="wrapper">

    <div class="input">
<!--        <a href="categories.form.php?id=0">ADD</a>-->
    </div>
    <div class="list">
        <div class="list-container">
            <div class="items-container">
                <table>
                    <thead>
                    <tr>
                        <th></th><th>Id</th><th>email</th><th>status</th><th>address</th><th><a href="?orderby=<?=$str_order?>">date_updated</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(empty($_GET['orderby']))
                    {
                        $commands = $data->search("SELECT *, status.name as statusname FROM commands INNER JOIN users ON users.id=commands.user_id INNER JOIN status on status.id=commands.status_id order BY date_updated DESC");
                    } else{
                        $commands = $data->search("Select *, status.name as statusname From commands INNER JOIN users ON users.id=commands.user_id INNER JOIN status on status.id=commands.status_id order by date_updated  $str_order");
                    }
                    foreach($commands as $command){
                        ?>
                        <tr>
                            <td><a href="/admin/commands.form.php?id=<?= $command['id'] ?>">E</a></td>
                           <td> <?php echo $command['id']; ?></td>
                           <td> <?php echo $command['email']; ?></td>
                           <td> <?php echo $command['statusname'];?></td>
                            <td> <?php echo $command['address']; ?></td>
                            <td> <?php echo $command['date_updated'];?></td>

                    <?php } ?>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
</body>
</html>
