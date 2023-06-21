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

class Duel {

    //attributs profil
    public $uuid;
    public $user1;
    public $user2;
    public $status;
    public $winner;
    public $infos;
    public $date;

    public function __construct($uuid, $user1, $user2, $status, $winner, $infos, $date){
        $this-> uuid = $uuid;
        $this-> user1 = $user1;
        $this-> user2 = $user2;
        $this-> status = $status;
        $this-> winner = $winner;
        $this-> infos = $infos;
        $this-> date = $date;

    }

}


?>