<?php
global $data;
include_once "menu.php";
?>


<div class="wrapper">
    <div class="list">
        <div id="form">
            <h1>PRODUCTS FORM</h1>
            <div class="form-container">
            <form action="/admin/action/products.php" method="POST">
                <div class="form-content">

                    <label for="">Product name </label>
                    <input type="text" name="name_product">

                    <label for=""> description </label>
                    <textarea name="description" id="" cols="10" rows="10"></textarea>

                    <label for=""> stock </label>
                    <input type="number" name="stock">


                    <label for=""> price </label>
                    <input type="text" name="price">

                    <label for=""> statut </label>
                    <input type="text" name="status">

                    <label for=""> category </label>
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
                </div>
                <div id="form-footer">
                    <input id="submit" type="submit" value="add">
                </div>


            </form>
            </div>
        </div>
    </div>
</div>
