<?php

global $data;
include_once str_replace("public/admin/action","src",__DIR__) . "/utils.php";

if(isset($_SESSION['id']))
{
    $user = $data->getItem('users', $_SESSION['id']);
    if($user['role'] == 2) {
        if (isset($_GET['id'])) {
            if ($_GET['id'] <= 0) {
                if (isset($_POST['name'])) {

                    $data->insert('categories', ['name'], [$_POST['name']]);
                    header('Location: /admin/categories.php');
                }
            } else {
                if (isset($_POST['name'])) {

                    $data->update('categories', ['name'], [$_POST['name'], $_GET['id']], ['id']);
                    header('Location: /admin/categories.php');
                }
            }
        }
    }
}
