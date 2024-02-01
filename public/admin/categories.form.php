<?php

include_once "menu.php";

?>
<div class="wrapper">
    <div class="list">
        <div id="form">
            <h1>CATEGORY FORM</h1>
            
            <div class="form-container">
                <form action="/admin/action/category.php" method="POST">
                    <div class="form-content">
                    NAME : <input name="name" type="text">

                    </div>
                    <div id="form-footer">
                        <input id="submit" type="submit">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

