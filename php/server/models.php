<?php 

//---------- CLASSES D'OBETS ----------//

//utilisateur//
class User {

    //attributs utilisateur
    public $uuid;
    public $username;
    public $email;
    public $permission;
    public $date;

    //constructeur & valorisation des attributs
    public function User($uuid, $username, $email, $permission, $date) {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->email = $email;
        $this->permission = $permission;
        $this->date = $date;
    }}

    //profile/
    class Profile {

    //attributs profil
    public $uuid;
    public $date;
    public $nbDuelJoue;
    public $nbDuelGagne;
    public $rank;

    public function Profile($uuid, $date, $nbDuelJoue, $nbDuelGagne, $rank){
        $this-> uuid= $uuid;
        $this-> date = $date;
        $this-> nbDuelJoue = $nbDuelJoue;
        $this-> nbDuelGagne = $nbDuelGagne;
        $this-> $rank = $rank;

    }

}


?>