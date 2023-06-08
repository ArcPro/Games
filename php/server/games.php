<?php
include "database.php";

function userGameStatus($uuid) {
    global $pdo;
    $status = $pdo->verifGameStatus($uuid);
    return $status;
}

function checkExistingGames($uuid) {
    global $pdo;
    $result = $pdo->existingDuel($uuid);
    return $result;
}

function createGame($uuid) {
    global $pdo;
    $pdo->createDuel($uuid);
}

function updateGame($uuid, $status) {
    global $pdo;
    $pdo->changeDuelStatus($uuid, $status);
}

function joinGame($uuid, $duelUuid) {
    global $pdo;
    $pdo->joinDuel($uuid, $duelUuid);
}


// createGame($uuid) {

// }