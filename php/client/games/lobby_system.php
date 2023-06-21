<?php
include "../../server/games.php";
session_start();



$gameStatus = userGameStatus($_SESSION["uuid"]); 
if (isset($_GET["remove"])) {
    updateGame($_SESSION["uuid"], "CANCELED");
    echo "<script>window.location.href = 'http://localhost/ArcPro/chess/';</script>";
}
// print_r($gameStatus);

if (empty($gameStatus) || $gameStatus["duelStatus"] == NULL || $gameStatus["duelStatus"] == "CANCELED") { // Si on a aucune partie en cours
    if (!checkExistingGames($_SESSION["uuid"])) { // Si aucune partie n'attend de joueur
        createGame($_SESSION["uuid"]);
        include "create_game.php";
    } else { // Join game
        joinGame($_SESSION["uuid"], checkExistingGames($_SESSION["uuid"])["uuid"]);
    }

} else {
    if ($gameStatus["duelStatus"] == "WAITING") {
        include "create_game.php";
        $date1 = new DateTime(userGameStatus($_SESSION["uuid"])["date"]);
        $date2 = new DateTime(date("Y-m-d H:i:s"));

        $diff = $date1->diff($date2);
        if ($diff->format("%I") >= 5) {
            updateGame($_SESSION["uuid"], "CANCELED");
            echo "<script>window.location.href = 'http://localhost/ArcPro/chess/';</script>";
        }
        // echo $diff->format("%R%a jours %H heures %I minutes %S secondes");
        echo "<script>document.getElementById('createGame').innerText = 'Annuler la partie';
        document.getElementById('createGame').onclick = removeGame;
        document.getElementById('gameDisplay').innerText = '".$diff->format("%I minutes %S secondes")."'";
    } else {
        include "game_system.php";
    }
}

?>

