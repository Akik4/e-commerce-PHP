<?php

include_once "../../src/utils.php";
global $data;


if(isset($_POST['address']) && $_POST['address'] != "")
{
    $rows = $data->getRowsBy("products_cart", "cart_id", $_SESSION['id']);

    $data->insert("commands", ["user_id", "status", "address"], [$_SESSION['id'], 0, $_POST['address']]);
    $command = $data->getLastRowBy("commands", "user_id", $_SESSION['id']);
    $command_id = $command['id'];

    foreach ($rows as $row)
    {
        $data->insert("products_command", ['command_id', 'product_id'], [$command_id, $row['product_id']]);
        $data->remove("products_cart", $row['id']);
    }
}

header("Location: /profile.php?id=". $_SESSION['id']);
