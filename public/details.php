<?php
global $data;
include_once "./template/header.php";

$productId = $_GET['id'];
$product = $data->getItem('products', $productId);
$comments = $data->getComments($productId);

$productName = $product['name'];
$productPrice = $product['price'];
$productDescription = $product['description'];
$productImage = $product['image_url'];

?>
<html>
<head>
    <title>Détails du produit</title>
</head>
<body>
    <div class="product-details">
        <div>
        <img src="<?= $productImage ?>" alt="<?= $productName ?>">
        </div>
        <div>
        <h1><?php echo $productName; ?></h1>
        <p><?php echo $productPrice; ?> $</p>
        <p><?php echo $productDescription; ?></p>
        </div>
    </div>
    <div class="comments">
        <div class="add-comments">

        </div>
        <h3>Comments</h3>
        <?php foreach ($comments as $row){ ?>
            <div class="comment-container">
                <?php 
                    $username  = $row["username"];
                    $text = $row['text'];
                    $commentDate = date("d/m/Y H:i", strtotime($row["posted_date"])); 
                ?>
                <span><?= $username ?></span>
                <span><?= $commentDate;?></span>
                <span><?= $text; ?></span>
                <span></span>
                
                
            </div>

            <?php } ?>
    </div>

    
    


    <a href="index.php">Retour</a>
</body>
</html>
