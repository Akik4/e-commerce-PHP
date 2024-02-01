<?php

global $data;
include_once "./template/header.php";
?>

    <div id="main-index">
        <form method="get" action="index.php">
            <input type="search" name="search_bar">
            <select name="options">
                <option value="all">all</option>
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
        </form>
        <div id="card-container">
        <?php
            if(isset($_GET['search_bar']))
            {
                if($_GET['options'] == "all")
                {
                    $rows = $data->search("SELECT * FROM products WHERE name LIKE ?", ["%". $_GET['search_bar'] ."%"]);
                } else {
                    $rows = $data->search("SELECT * FROM products WHERE name LIKE ? and category = ?", ["%". $_GET['search_bar'] ."%", $_GET['options']]);
                }
            } else {
                $rows = $data->search("SELECT * FROM products");
            }
            foreach ($rows as $row){
                ?>
                <a href="details.php?id=<?= $row['id'] ?>" class="card-link">
                    <div class="card">
                        <div class="visual">
                            <img src="<?= $row['image_url']?>" height="100%" width="100%">
                        </div>

                        <div class="card-info">
                            <h4><?= $row['name'] ?></h4>
                            <p><?= $row['price'] ?>$</p>
                            <p><?= $row['description'] ?></p>
                            <a href="action/add-cart.php?id=<?= $row['id']?>">+ add to cart</a>
                        </div>
                    </div>
                </a>


                <?php
            }
        ?>

        </div>
    </div>
</body>
</html>
