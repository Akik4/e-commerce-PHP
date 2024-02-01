<?php

global $data;
include_once "./template/header.php";
?>

    <div class="searchBar">
        <input type="search" name="search_bar">
        <button>search</button>
        <label for=""> search by category </label>
            <select name="category" id="">
                <?php
                    $rows = $data->getRows('categories');
                    foreach ($rows as $row)
                    {
                        ?>
                        <option value="<?= $row['id']?>"><?= $row['name'] ?></option>
                <?php
                    }
                ?>
            </select>
        <button>search</button>
    </div>

    <div id="main-index">
        <div id="card-container">
        <?php
            $rows = $data->getRows('products');
            foreach ($rows as $row){
//                var_dump($row);
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
                </div>
            </div>
                <?php
            }
        ?>

        </div>
    </div>
</body>
</html>
