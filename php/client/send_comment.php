<?php
session_start();
include_once "../server/profile_infos.php";
sendComment(htmlspecialchars($_POST["uuid"]), htmlspecialchars($_SESSION["uuid"]), htmlspecialchars($_POST["comment"]));
header('Location: http://localhost/ArcPro/chess/');