<?php

function isLogged() {
    if (isset($_SESSION["uuid"])) {
        return true;
    }
    return false;
}

function registerUser() {

}


?>