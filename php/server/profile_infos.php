<?php
include "database.php";
function getProfileInfos($uuid) {
    global $pdo;
    return $pdo->getProfile($uuid);
}

$userInfos = getProfileInfos($_GET['uuid']);
