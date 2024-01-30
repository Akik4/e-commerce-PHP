<?php

require_once "database.php";

use Utils\poo\Database;

session_start();

$data = new Database();

$data->connect();

