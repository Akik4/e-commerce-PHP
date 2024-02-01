<?php
include_once "../../src/utils.php";

session_unset();
session_destroy();

header('Location: /index.php');
