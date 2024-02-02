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
                <?php if($row['stock'] == 0): ?>
                    <div class="card-unavailable">
                    <?php else: ?>
                        <div class="card">
                <?php endif; ?>
                    <a href="details.php?id=<?= $row['id'] ?>" class="card-link">
                        <div class="visual">
                            <img src="<?= $row['image_url']?>" height="100%" width="100%">
                        </div>

                        <div class="card-info">
                            <h4><?= $row['name'] ?></h4>
                            <?php if($row['sale'] == 0): ?>
                                <p><?= $row['price'] ?>$</p>
                            <?php else: ?>
                                <p style="text-decoration: line-through;"><?= $row['price'] ?>$</p>
                                <p><?= $row['price']-($row['price']*$row['sale']/100 )?>$</p>
                            <?php endif; ?>
                            <?php if($row['stock'] > 0): ?>  
                                <a href="action/add-cart.php?id=<?= $row['id']?>">+ add to cart</a>
                            <?php endif; ?>
                            
                        </div>
                    </a>
                    </div>


                <?php
            }
        ?>
                    </div>
        </div>
    </div>
</body>
</html>
