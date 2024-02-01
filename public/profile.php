<?php

global $data;
include_once './template/header.php';

if(isset($_GET['id']))
{
?>

<?php
        $profile = $data->getUser($_GET['id']);
    ?>
            <div id="profil-content">
                <div id="profil-container">
                    <h1>PROFILE</h1>
                    <?php if($_GET['id'] == $_SESSION['id']): ?>
                    <a href="./action/logout.php">logout</a>
                    <?php endif; ?>
                    <h2>Info</h2>
                    <p>Username : <?= $profile['username']; ?></p>
                    <p>ID : <?= $_GET['id']; ?></p>
                    <p>Role : <?= $profile['rolename']; ?></p>
                    <p>Contact : <?= $profile['email']; ?></p>
                    <h2>Edit</h2>
                    <div id="edit-container">
                        <div class="edit-cell">
                            <span>Username </span>
                            <a href="./profile.edit.php?item=Username&id=<?= $_SESSION['id']?>">Edit</a>
                        </div>
                        <div class="edit-cell">
                            <span>Email </span>
                            <a href="./profile.edit.php?item=Email&id=<?= $_SESSION['id']?>">Edit</a>
                        </div>
                        <div class="edit-cell">
                            <span>Password </span>
                            <a href="./profile.edit.php?item=Password&id=<?= $_SESSION['id']?>">Edit</a>
                        </div>
                    </div>
                    <h2>Cart</h2>
                    <?php
                        $price = 0.00;
                        $rows = $data->getRowsBy("products_cart", "cart_id", $_SESSION['id']);

                        foreach ($rows as $row):
                            $item = $data->getItem( "products",$row['product_id']);
                        ?>
                            <p><?= $item['name']?> : <?= $item['price']?> <a href="action/cart-remove.php?id=<?= $row['id'] ?>">remove</a></p>

                        <?php
                            $price += $item['price'];
                        endforeach;
                        if(sizeof($rows) > 0)
                        {
                        ?>
                    <p>Total : <?=number_format($price, 2, ',', ' ');?>$</p>
                            <form action="action/command-add.php" method="POST">
                                <input name="address" type="text">
                                <input type="submit" value="Passer commander">
                                <?php
                                    if(isset($_GET['error'])){
                                        if($_GET['error'] = 1)
                                        {
                                            ?>
                                                <p style="color:red">Certains articles ne sont plus en stocks</p>
                                            <?php
                                        }
                                    }

                                ?>
                            </form>
                            <?php
                        }
                    ?>
                    <h2>Commands</h2>
                    <?php
                    $rows = $data->getRowsBy("commands", "user_id", $_SESSION['id']);

                    foreach ($rows as $row):
                        $commands = $data->getRowsBy("products_command", 'command_id', $row['id']);

                    foreach ($commands as $command)
                            {
                                echo $command['command_id'];
                                $items = $data->getItem("products", $command['product_id']);
                                echo $items['name']. "<br>";
                            }
                        ?>
<!--                        <p>--><?php //= $item['name']?><!-- : --><?php //= $item['price']?><!-- <a href="action/cart-remove.php?id=--><?php //= $row['id'] ?><!--">remove</a></p>-->

                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <footer>footer</footer>
        </div>
    </div>
<?php
}
?>


