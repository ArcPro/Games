<?php

session_start();

include_once "php/server/database.php";
include_once "php/server/login_system.php";
include_once "php/client/utils.php";
include_once "php/client/header.php";
include_once "php/client/connexion.php";

// echo format_uuidv4(random_bytes(16));

?>

<form method="post">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" name="login">
</form>