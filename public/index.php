<?php

global $data;
include_once "./template/header.php";
?>

    <input type="search" name="search_bar">
    <button>search</button>
    <div id="main-index">
        <div id="card-container">
        <?php
            $rows = $data->getRows('products');
            foreach ($rows as $row){
                ?>
            <div class="card">
                <div class="visual">
                    <img src="<?= $row['image_url']?>" height="100%" width="100%">
                </div>
                <div class="card-info">
                    <h4><?= $row['name'] ?></h4>
                    <p><?= $row['price'] ?>$</p>
    <!--                <p>--><?php //= $row[''] ?><!--</p>-->
                    <p><?= $row['description'] ?></p>
                    <a href="action/add-cart.php?id=<?= $row['id']?>">+ add to cart</a>
                </div>
            </div>
                <?php
            }
        ?>

        </div>
    </div>
</body>
</html>
