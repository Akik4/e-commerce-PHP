<?php
include_once("../../src/session.php");

    session_unset();
    session_destroy();

    header('Location: ../view/index.php');
