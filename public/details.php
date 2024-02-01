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
$productRating = $product['star'];

?>
<html>
<head>
    <title>Détails du produit</title>
</head>
<body>
<a href="index.php" style="text-decoration: none; color: black;"> < Retour</a>
    <div class="product-details">
        <div>
        <img src="<?= $productImage ?>" alt="<?= $productName ?>">
        </div>
        <div>
        <h1><?php echo $productName; ?></h1>
        <p><?php echo $productPrice; ?> $</p>
        <p><?php echo $productDescription; ?></p>
        <p><?php echo $productRating; ?> / 5</p>
        </div>
    </div>
    <div class="comments">
    <h3>Comments</h3>
        <div class="add-comments">
            <form action="./action/comment.php?id=<?=$_GET['id']?>" class="comment-form" METHOD="POST">
                <label for="text">Enter your experience here :</label>
                <input type="text" name="comment" required>
                <label for="star">0-5:</label>
                <input type="range" name="star" min="0" max="5">
                <input id="submit" type="submit" value="submit">
            </form>
        </div>
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
