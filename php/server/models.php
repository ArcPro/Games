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
    public $avatar;

    //constructeur & valorisation des attributs
    public function __construct($uuid, $username, $email, $permission, $date, $avatar) {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->email = $email;
        $this->permission = $permission;
        $this->date = $date;
        $this->avatar = $avatar;
    }
}

    //profile/
    class Profile {

    //attributs profil
    public $uuid;
    public $username;
    public $permission;
    public $date;
    public $avatar;
    public $nbDuelJoue;
    public $nbDuelGagne;

    public function __construct($uuid, $username, $permission, $date, $avatar, $nbDuelJoue, $nbDuelGagne){
        $this-> uuid= $uuid;
        $this-> username= $username;
        $this-> permission = $permission;
        $this-> date = $date;
        $this-> avatar = $avatar;
        $this-> nbDuelJoue = $nbDuelJoue;
        $this-> nbDuelGagne = $nbDuelGagne;

    }

}


?>