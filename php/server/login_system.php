<?php

// Login du compte
if (isset($_POST["login"]))
{
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    loginUser($username, $password);
}


function isLogged() {
    if (isset($_SESSION["uuid"])) {
        return true;
    }
    return false;
}

function checkUser($username) {

}

function loginUser($username, $password) {    
    // Récupérer le mot de passe de $username
    if (password_verify($password, $hash)) {
        // Récupérer toutes les informations de l'utilisateur
        $_SESSION["uuid"] = ;
        $_SESSION["username"] = ;
        $_SESSION["email"] = ;
        $_SESSION["permission"] = ;
        $_SESSION["date"] = ;
    } else {
        // Informations incorrectes
    }

}

function registerUser($username, $password, $email) {
    if (!checkUser($username)) {
        // Enregistrer l'utilisateur
        $hash = password_hash($password, PASSWORD_BCRYPT);

    } else {
        // Mettre sur la page de login
    }
}


?>