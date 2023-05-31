<?php

// var image = document.getElementById('profile-main-picture');

//         image.src = 'image/user-plus.png';
//         image.removeAttribute('onclick');
//         image.addEventListener('click', showLogin);
//         image.style.border = 'none';
//         navOne.classList.add('active');

//----LOGIN-----//
if (isset($_POST["login"]))
{
    $username = htmlspecialchars($_POST["pseudo"]);
    $password = htmlspecialchars($_POST["password"]);
    loginUser($username, $password);
}

//----REGISTER-----//
if (isset($_POST["register"]))
{
            
    $username=trim($_POST["pseudo"]);
    $email=trim($_POST["email"]);
    $password=trim($_POST["password"]);
    registerUser($username, $password, $email);
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
            // header("Location: http://www.$_SESSION['email'].com/another-page.php", true, 301);
            // exit();
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
        if (strlen($password) >= 8) {
            if (strlen($password) <= 24) {
                include_once "utils.php";
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $uuid = format_uuidv4(random_bytes(16));
                $pdo->createUser($uuid, $username, $email, $hash);
                loginUser($username, $password);
                echo '<div class="alert alert-success">
        <p>Utilisateur ajouté avec succès</p>
            <p> 
                <a href="index.php" class="btn btn-secondary">OK</a>
            </p>
        </div>';
            } else {echo strlen($password);}
        }
        //controles mdp 
            //Affichage message succès
        
    }
}


?>