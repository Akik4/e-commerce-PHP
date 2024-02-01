<?php

global $data;
include_once "menu.php";

?>
<div class="wrapper">

    <div class="input">
        <a href="product.form.php">ADD</a>
    </div>
    <div class="list">
        <div class="list-container">
            <table>
                <thead>
                <tr>
                    <th></th></th><th>Id</th><th>Name</th><th>description</th>
                    <th>stock</th><th>price</th><th>status</th><th>star</th>
                    <th>category</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($data->getRows("products") as $product){
                        ?>
                    <tr>
                        <td><a href="/admin/action/remove.php?type=products&id=<?=$product['id']?>">x</a></td>
                        <td> <?=  $product['id']; ?> </td>
                        <td> <?=  $product['name']; ?> </td>
                        <td> <?=  $product['description']; ?> </td>
                        <td> <?=  $product['stock']; ?> </td>
                        <td> <?=  $product['price']; ?> </td>
                        <td> <?=  $product['status']; ?> </td>
                        <td> <?=  $product['star']; ?> </td>
                        <td> <?=  $product['category']; ?> </td>
                <?php } ?>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>
</body>
</html>

