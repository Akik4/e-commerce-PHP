<?php
global $data;
include_once "./template/header.php";

$productId = $_GET['id'];
$product = $data->getItem('products', $productId);
$comments = $data->getComments($productId);
$data->updateComments($productId);

$productName = $product['name'];
$productPrice = $product['price'];
$productDescription = $product['description'];
$productImage = $product['image_url'];
$productRating = $product['star'];
$productStock = $product['stock'];
$productSale = $product['sale'];
if(isset($_SESSION['id'])){
    $canComment = $data->checkIfUserCanComment($_SESSION['id'], $_GET['id']);
}

?>
<html>
<head>
    <title>Détails du produit</title>
</head>
<body>
<a href="index.php" style="text-decoration: none; color: black;"> < Retour</a>
    <div class="product-details">
        <div style="max-width: 60vw;">
        <img src="<?= $productImage ?>" alt="<?= $productName ?>" style="max-width: 100%;">
        </div>
        <div>
        <h1><?=$productName; ?></h1>
        <?php if($productSale == 0): ?>
            <p><?= $productPrice ?>$</p>
        <?php else: ?>
            <p style="text-decoration: line-through;"><?= $productPrice ?>$</p>
            <p><?= $productPrice-($productPrice*$productSale/100 )?>$</p>
        <?php endif; ?>
        <p><?= $productDescription; ?></p>
        <p><?= $productRating; ?> / 5</p>
        <?php if($isConnected && $productStock > 0): ?>
        <form action="./action/add-cart.php?id=<?= $_GET['id']?>" method="post"><input type="submit" value="ajouter au panier"></form>
        <?php endif; ?>
        </div>
    </div>
    <div class="comments">
    <h3>Comments</h3>
        <?php if($isConnected){
                    if($canComment) { ?>
            <div class="add-comments">
                <form action="./action/comment.php?id=<?=$_GET['id']?>" class="comment-form" METHOD="POST">
                    <label for="text">Enter your experience here :</label>
                    <input type="text" name="comment" required>
                    <label for="star">0-5:</label>
                    <input type="range" name="star" min="0" max="5">
                    <input id="submit" type="submit" value="submit">
                </form>
            </div>
        <?php } }?>
        
        <?php foreach ($comments as $row){ ?>
            <div class="comment-container">
                <?php 
                    $username  = $row["username"];
                    $star = $row['star'];
                    $text = $row['text'];
                    $commentDate = date("d/m/Y H:i", strtotime($row["posted_date"])); 
                ?>
                <span><?= $username ?></span>
                <span><h5><?= $commentDate;?></h5></span>
                <span><?= $star ?>/5</span>
                <span><?= $text; ?></span>
                <span></span>
                
                
            </div>

            <?php } ?>
    </div>

</body>
</html>
