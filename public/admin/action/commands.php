<?php

global $data;
include_once str_replace("public/admin/action","src",__DIR__) . "/utils.php";


if(isset($_GET['id'])) {
    if ($_GET['id'] > 0) {
        if (isset($_POST['status'])) {

            $data->update('commands', ['status'], [$_POST['status'], $_GET['id']], ['id']);
            header('Location: /admin/commands.php');
        }
    }
}