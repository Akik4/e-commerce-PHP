<?php

global $data;
include_once "menu.php";

?>
<div class="wrapper">

    <div class="input">
        <a href="product.form.php?id=0">ADD</a>
    </div>
    <div class="list">
        <div class="list-container">
            <table>
                <thead>
                <tr>
                    <th></th></th><th>Id</th><th>Name</th><th>description</th>
                    <th>stock</th><th>price</th><th>sale</th><th>status</th><th>star</th>
                    <th>category</th>
                    <th>image</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($data->getRows("products") as $product){
                        ?>
                    <tr>
                        <td><a href="/admin/product.form.php?&id=<?=$product['id']?>">E </a><a href="/admin/action/remove.php?type=products&id=<?=$product['id']?>">X</a></td>
                        <td> <?=  $product['id']; ?> </td>
                        <td> <?=  $product['name']; ?> </td>
                        <td height="50"> 
                            <div class="product-table-container">
                                <?=  $product['description']; ?> 
                            </div>
                        </td>
                        <td> <?=  $product['stock']; ?> </td>
                        <td> <?=  $product['price']; ?> </td>
                        <td> <?=  $product['sale']; ?> </td>
                        <td> <?=  $product['status']; ?> </td>
                        <td> <?=  $product['star']; ?> </td>
                        <td> <?=  $product['category']; ?> </td>
                        <td> 
                            <div class="product-table-container">
                                <?=  $product['image_url']; ?> </td>
                            </div> 
                        </td>
                <?php } ?>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>
</body>
</html>

