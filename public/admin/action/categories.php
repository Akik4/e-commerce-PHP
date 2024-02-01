<?php

global $data;
include_once str_replace("public/admin/action","src",__DIR__) . "/utils.php";

if(isset($_POST['name'])) {

    $data->insert('categories', ['name'], [$_POST['name']]);
    header('Location: /admin/categories.php');
}