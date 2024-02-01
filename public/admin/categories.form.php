<?php

global $data;
include_once "menu.php";


if(isset($_GET['id']))
{
    $name = "";
    if($_GET['id'] > 0)
    {
        $product = $data->getItem("categories", $_GET['id']);

        $name = $product['name'];
    }
}
?>
<div class="wrapper">
    <div class="list">
        <div id="form">
            <h1>CATEGORY FORM</h1>
            
            <div class="form-container">
                <form action="/admin/action/categories.php?id=<?= $_GET['id']?>" method="POST">
                    <div class="form-content">
                    NAME : <input name="name" type="text" value="<?=$name?>">

                    </div>
                    <div id="form-footer">
                        <input id="submit" type="submit">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

