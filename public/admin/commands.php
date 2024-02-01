<?php

global $data;
include_once "menu.php";

?>
<div class="wrapper">

    <div class="input"> </div>
    <div class="list">
        <div class="list-container">
            <ul>
                <?php
                foreach($data->getRows("commands") as $command){
                    ?>
                    <li>
                        <?php echo $command['id'];echo $command['user_id']; echo $command['status'];?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

</div>

