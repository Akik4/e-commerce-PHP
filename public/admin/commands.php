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
                        <th></th><th>Id</th><th>user_id</th><th>status</th><th>address</th><th><a href="?orderby=<?=$str_order?>">date_updated</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(empty($_GET['orderby']))
                    {
                        $commands = $data->search("SELECT * FROM commands ORDER BY date_updated DESC");
                    } else{
                        $commands = $data->getRowsOrderBy("commands", $str_order);
                    }
                    foreach($commands as $command){
                        ?>
                        <tr>
                            <td><a href="/admin/commands.form.php?id=<?= $command['id'] ?>">E</a></td>
                           <td> <?php echo $command['id']; ?></td>
                           <td> <?php echo $command['user_id']; ?></td>
                           <td> <?php echo $command['status'];?></td>
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
