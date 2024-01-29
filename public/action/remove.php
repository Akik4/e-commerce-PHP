<?php
require_once("../../src/Db.php");
include_once("../../src/session.php");

use Utils\database\Db;


$data = new Db();
$data->connect();

if(isset($_GET['id']))
{
    $data->remove_book($_GET['id']);
    header("Location: ../view/index.php");
}
?>