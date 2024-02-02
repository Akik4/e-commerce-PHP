<?php

global $data;
include_once str_replace("public/admin/action","src",__DIR__) . "/utils.php";


if(isset($_SESSION['id'])) {
    $user = $data->getItem('users', $_SESSION['id']);
    if ($user['role'] == 2) {
        if (isset($_GET['id'])) {
            if ($_GET['id'] <= 0) {
                if (isset($_POST['name_product']) &&
                    isset($_POST['description']) &&
                    isset($_POST['stock']) &&
                    isset($_POST['price']) &&
                    isset($_POST['sale']) &&
                    isset($_POST['status']) &&
                    isset($_POST['category']) &&
                    isset($_POST['img_url'])) {
                    $data->insert("products",
                        ["name", "description", "price", "stock", "category", "status", "image_url", "sale"],
                        [$_POST['name_product'], $_POST['description'], $_POST['price'],
                            $_POST['stock'], $_POST['category'], $_POST['status'], $_POST['img_url'], $_POST['sale']]);

                    header("Location: /admin/products.php");
                } else {
                    header('Location: ../register.php?error=1');
                }
            } else {
                if (isset($_POST['name_product']) &&
                    isset($_POST['description']) &&
                    isset($_POST['stock']) &&
                    isset($_POST['price']) &&
                    isset($_POST['sale']) &&
                    isset($_POST['status']) &&
                    isset($_POST['category']) &&
                    isset($_POST['img_url'])) {
                    $data->update("products",
                        ["name", "description", "price", "stock", "category", "status", "image_url", "sale"],
                        [$_POST['name_product'], $_POST['description'], $_POST['price'],
                            $_POST['stock'], $_POST['category'], $_POST['status'], $_POST['img_url'], $_POST['sale'], $_GET['id']], ["id"]);

                    header("Location: /admin/products.php");
                } else {
                    header('Location: ../register.php?error=1');
                }
            }
        }
    }
}
