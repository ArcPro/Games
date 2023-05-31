<?php
include "database.php";
include "login_system.php";
function getProfileInfos($username) {
    global $pdo;
    return $pdo->getProfile($username);
}

$userInfos = getProfileInfos($_GET['username']);
