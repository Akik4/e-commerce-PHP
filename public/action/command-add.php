<?php

include_once "../../src/utils.php";
global $data;


if(isset($_POST['address']) && $_POST['address'] != "")
{
    $rows = $data->getRowsBy("products_cart", "cart_id", $_SESSION['id']);

    $output = [];
    foreach ($rows as $row)
    {
        $output[''. $row['product_id']] = ($output[''. $row['product_id']] ?? 0) + 1;
    }

    $result = array_keys($output);

    $missing = false;
    for ($i = 0; $i < count($output); $i++) {
        $product = $data->getItem("products", $result[$i]);
        if($product['stock'] - $output[$result[$i]] < 0)
        {
            $missing = true;
        }
    }

    if($missing)
    {
        header("Location: /profile.php?id=". $_SESSION['id'] ."&error=1");
    } else
    {
        $data->insert("commands", ["user_id", "status", "address"], [$_SESSION['id'], 0, $_POST['address']]);
        $command = $data->getLastRowBy("commands", "user_id", $_SESSION['id']);
        $command_id = $command['id'];

        foreach ($rows as $row)
        {
            $quantity = $data->getItem("products", $row['product_id']);
            $data->insert("products_command", ['command_id', 'product_id'], [$command_id, $row['product_id']]);
            $data->update("products", ["stock"], [$quantity['stock'] - 1,  $row['product_id']], ["id"]);
            $data->remove("products_cart", $row['id']);
        }
        header("Location: /profile.php?id=". $_SESSION['id']);
    }
}

