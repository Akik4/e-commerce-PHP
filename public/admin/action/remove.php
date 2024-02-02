<?php

global $data;
include_once str_replace("public/admin/action","src",__DIR__) . "/utils.php";


if(isset($_SESSION['id'])) {
    $user = $data->getItem('users', $_SESSION['id']);
    if ($user['role'] == 2) {
        if (isset($_GET['type']) && isset($_GET['id'])) {
            $data->remove($_GET['type'], $_GET['id']);
            header("Location: /admin/" . $_GET['type'] . ".php");
        }
    }
}