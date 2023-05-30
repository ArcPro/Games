<?php 

//---------- CLASSES D'OBETS ----------//

//UTILISATEUR//
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

?>