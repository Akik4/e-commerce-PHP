<?php
ob_start();
require_once("../../src/Db.php");
include_once("../../src/session.php");

use Utils\database\Db;


$data = new Db();
$data->connect();

if($_GET['id'] <= 0)
{
     if(isset($_POST['name']) && isset($_POST['price']))
     {
        
         $avaible = 0;
         if(is_numeric( $_POST['price'] ) && floor( $_POST['price'] ) != $_POST['price'])
         {
             if(isset($_POST['avaible']))
             {
                 $avaible = 1;
             }
             $data->insert_book($_POST['name'], $_POST['price'], $avaible, $_SESSION['id']);
             header("Location: ../view/index.php");
             exit;
         }
     }
} else {
    if(isset($_POST['name']) && isset($_POST['price']))
    {
        $avaible = 0;
        if(isset($_POST['avaible']))
        {
            $avaible = 1;
        } 
        $data->update_book($_GET['id'] ,$_POST['name'], $_POST['price'], $avaible, $_SESSION['id']);
        header("Location: ../view/index.php");
        exit;
    }
}
