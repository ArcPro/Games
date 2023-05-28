<?php

$pdo=bdd::getBdd();

// Login du compte
if (isset($_POST["login"]))
{
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    loginUser($username, $password, $pdo);
}


function isLogged() {
    if (isset($_SESSION["uuid"])) {
        return true;
    }
    return false;
}

function checkUser($username) {
    global $pdo; 
    return $pdo->checkUserExistence($username);
}

function loginUser($username, $password) {    
    global $pdo; 
    // Récupérer le mot de passe de $username
    if (checkUser($username)) {
        $hash = $pdo->getUserPassword($username);
        if (password_verify($password, $hash)) {
            // Récupérer toutes les informations de l'utilisateur
            $user = $pdo->getUserInformations($username);
            // var_dump($user);

            $_SESSION["uuid"] = $user->uuid;
            $_SESSION["username"] = $user->username;
            $_SESSION["email"] = $user->email;
            $_SESSION["permission"] = $user->permission;
            $_SESSION["date"] = $user->date;
        } else {
            // Informations incorrectes
        }
    } else {
        // Compte existe pas
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