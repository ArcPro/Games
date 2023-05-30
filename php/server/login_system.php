<?php

$pdo=bdd::getBdd();

//----LOGIN-----//
if (isset($_POST["login"]))
{
    $username = htmlspecialchars($_POST["pseudo"]);
    $password = htmlspecialchars($_POST["password"]);
    loginUser($username, $password);
}

//----REGISTER-----//
if (isset($_POST["Enregistrer"]))
{
            
    $username=trim($_POST["username"]);
    $email=trim($_POST["email"]);
    $password=trim($_POST["password"]);
    $pdo->createUser($username, $email, $password);
}

if (isset($_POST["Enregistrer"]))
{
            
    $username=trim($_POST["username"]);
    $email=trim($_POST["email"]);
    $password=trim($_POST["password"]);
    $pdo->createUser($username, $email, $password);
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
            echo '<script>
            window.addEventListener("load", function () {
                showLogin()
                const divElement = document.getElementById("exampleInputPassword1");
                divElement.classList.remove("form-control");
                divElement.classList.add("form-control", "is-invalid");

                const passwordDiv = document.getElementById("password");
                const divInvalidFeedback = document.createElement("div");
                divInvalidFeedback.className = "invalid-feedback";
                divInvalidFeedback.innerHTML = "Désolé, les informations ne correspondent pas.";
                passwordDiv.appendChild(divInvalidFeedback);

              })
              </script>'; // 
            // Informations incorrectes
        }
    } else {
        // Compte existe pas
    }
}

function registerUser($username, $password, $email) {
    global $pdo;


    if (!checkUser($username)) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $pdo->createUser($username, $email, $hash);
        
        //controles mdp 
            //Affichage message succès
        echo '<div class="alert alert-success">
        <p>Utilisateur ajouté avec succès</p>
            <p> 
                <a href="index.php" class="btn btn-secondary">OK</a>
            </p>
        </div>';
    }
}


?>