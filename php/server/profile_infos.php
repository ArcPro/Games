<?php

include_once "database.php";

function getProfileInfos($uuid) {
    global $pdo;
    return $pdo->getProfile($uuid);
}
function sendComment($sendUuid, $receiveUuid, $msg) {
    global $pdo;
    return $pdo->sendComment($sendUuid, $receiveUuid, $msg);
}
function getComments($uuid) {
    global $pdo;
    $msg = $pdo->getCommentsByID($uuid);
    for ($i = 0 ; $i<count($msg) ; $i++) {
        // $msg->
        echo '<div class="chatrow">
            <div class="chatbox">
                <img src="image/avatar/'.$msg[$i]["avatar"].'.png" style="width:50px;height:50px;border-radius:5px;">
                <div class="card-body" style="margin-top:-20px;">
                    <a>'.$msg[$i]["username"].'</a>
                    <p>'.$msg[$i]["message"].'</p>
                </div>
            </div>
            <a style="margin-top:12px;margin-left:-15px;border-left:solid 2px;height:28px;padding-left:10px;">'.date('d/m/Y', strtotime($msg[$i]["date"])).'</a>
        </div>';
    }
    // echo $pdo->getCommentsByID($uuid);
}