<?php
require_once("../../src/Db.php");
include_once("../../src/session.php");

use Utils\database\Db;


$data = new Db();
$data->connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if(isset($_SESSION['user']))
{
    ?>
        <header>
            <p><?= ($_SESSION['user']) ?></p>
            <a href="../action/logout.php"> <img src="https://cdn-icons-png.flaticon.com/512/320/320140.png" height="20px" width="20px"> </a>
        </header>

    <div class="container-btn">
        <a href="adding.php?id=0" class="add-btn">+ add book</a>
    </div>
    <?php
    $books = $data->get_books();
    foreach($books as $book)
    {
        ?>
        <div class="book-container" id= <?= $book['id'];?> >
            <div class="book-info">
                <p class="book-title"><?= $book['name'];?></p>
                <p>Status : <?php if($book['available']) { echo "Disponible";} else { echo "indisponible"; }?> </p>
                <p>Price : <?= $book['price'];?>$</p>
            </div>
            <div class="book-action">
                <a href="adding.php?id=<?php echo $book['id']; ?>"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/1024px-Edit_icon_%28the_Noun_Project_30184%29.svg.png" height="20px" width="20px"> </a>
                <a href="../action/remove.php?id=<?php echo $book['id']; ?>"><img src="https://t4.ftcdn.net/jpg/05/38/49/71/360_F_538497120_KNVvLjOqc4XWl0JM2Vp9LoqEgjGneL1Y.png" height="20px" width="20px"> </a>
                <p>Last edit by : <?php if($book['updated_by'] == $_SESSION['id']) { echo "<span style='color: blue;'>". $data->get_userName($book['updated_by']) ."</span>"; } else { echo "<span>". $data->get_userName($book['updated_by'])  ."</span>";}?></p>
            </div>
        </div>

        <?php
    }
} else {
    ?>
    <a href="register.php">Register</a>
    <a href="login.php">login</a>
    <?php
    $books = $data->get_books();
    foreach($books as $book)
    {
        ?>
        <div class="book-container" id= <?= $book['id'];?> >
            <p><?= $book['name'];?> |</p>
            <p><?php if($book['available']) { echo "Disponible";} else { echo "indisponible"; }?> </p>
            <p><?= $book['price'];?>$ |</p>

        </div>
        <?php
    }
}

?>



</body>
</html>