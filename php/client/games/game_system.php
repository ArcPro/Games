<?php
// Fichier une fois que le jeu est lancé.
$duel = getDuelInfos($_SESSION["uuid"]);
var_dump($duel);

if ($duel->status == "PLAYING") {
    echo($duel->infos);
    
}


function getChessBoard($duel) {}