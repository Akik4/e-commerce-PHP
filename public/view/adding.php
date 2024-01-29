<?php
require_once("../../src/Db.php");
include_once("../../src/session.php");

use Utils\database\Db;


$data = new Db();
$data->connect();

if($_GET['id'] <= 0)
{
    ?>
    <form type="submit" action="../action/adding.php?id=<?= $_GET['id']?>" method="post">
        Name <input type="text" name="name">
        Price <input type="text" name="price">
        Available <input type="checkbox" name="avaible" value="1">
        <input type="submit" value="ADD">
    </form>
<?php
} else
{
    $book = $data->get_book($_GET['id']);
    $check = "";
    if($book['available'] == 1)
    {
        $check = "checked";
    }
    ?>
    <form type="submit" action="../action/adding.php?id=<?= $_GET['id']?>" method="post">
        Name <input type="text" name="name" value="<?= $book['name']?>">
        Price <input type="text" name="price" value="<?= $book['price']?>">
        Available <input type="checkbox" name="avaible" value="1" <?= $check?>>
        <input type="submit" value="UPDATE">
    </form>
    <?php
}

?>