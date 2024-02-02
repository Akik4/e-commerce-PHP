<?php
global $data;
include_once "menu.php";

if(isset($_GET['id']))
{
    $name = "";
    $desc = "";
    $stock = "";
    $price = "";
    $status = "";
    $category = "";
    if($_GET['id'] > 0)
    {
        $product = $data->getItem("products", $_GET['id']);

        $name = $product['name'];
        $desc = $product['description'];
        $stock = $product['stock'];
        $price = $product['price'];
        $sale = $product['sale'];
        $status = $product['status'];
        $category = $product['category'];
        $img_url = $product['image_url'];
    }
}
?>


<div class="wrapper">
    <div class="list">
        <div id="form">
            <h1>PRODUCTS FORM</h1>
            <div class="form-container">
            <form action="/admin/action/products.php?id=<?= $_GET['id'] ?>" method="POST">
                <div class="form-content">

                    <label for="">Product name </label>
                    <input type="text" name="name_product" value="<?= $name ?>">

                    <label for=""> description </label>
                    <textarea name="description" id="" cols="10" rows="10" ><?= $desc ?></textarea>

                    <label for=""> stock </label>
                    <input type="number" name="stock" value="<?= $stock ?>">


                    <label for=""> price </label>
                    <input type="text" name="price" value="<?= $price ?>">

                    <label for=""> sale </label>
                    <input type="text" name="sale" value="<?= $sale ?>">

                    <label for=""> statut </label>
                    <input type="text" name="status" value="<?= $status ?>">

                    <label for=""> image-url </label>
                    <input type="text" name="img_url" value="<?= $img_url ?>">

                    <label for=""> category </label>
                    <select name="category" id="" value="<?= $category ?>">
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
                </div>
                <div id="form-footer">
                    <input id="submit" type="submit" value="add">
                </div>


            </form>
            </div>
        </div>
    </div>
</div>
