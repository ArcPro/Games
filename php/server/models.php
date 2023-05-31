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
    public function __construct($uuid, $username, $email, $permission, $date) {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->email = $email;
        $this->permission = $permission;
        $this->date = $date;
    }
}

    //profile/
    class Profile {

    //attributs profil
    public $uuid;
    public $username;
    public $permission;
    public $date;
    public $nbDuelJoue;
    public $nbDuelGagne;

    public function __construct($uuid, $username, $permission, $date, $nbDuelJoue, $nbDuelGagne){
        $this-> uuid= $uuid;
        $this-> username= $username;
        $this-> permission = $permission;
        $this-> date = $date;
        $this-> nbDuelJoue = $nbDuelJoue;
        $this-> nbDuelGagne = $nbDuelGagne;

    }

}


?>