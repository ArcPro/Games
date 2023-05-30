
<?php

// -------------------- CONNEXION BDD -------------------//
class bdd {

    private static $bdd = "mysql:host=localhost;dbname=games";
    private static $user = "root";
    private static $mdp = "";
    private static $monPdo;
    private static $getbdd_=null;
    private function __construct(){
    
    try{
        bdd::$monPdo = new PDO(bdd::$bdd, bdd::$user, bdd::$mdp);  

    }catch(Exception $e){
        throw new Exception($e->getMessage());
    }
 
    }

    //static permet d'éviter de devoir instacier à chaque appel dans le code
    public static function getBdd(){
        if (bdd::$getbdd_==null){
            bdd::$getbdd_ = new bdd();
        }
        return bdd::$getbdd_;
    }


//------------------- FONCTIONS ------------------//

//Check user existence
    public function checkUserExistence($username) {
        $q = "SELECT * FROM `user` WHERE username = :username";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':username', $username, PDO::PARAM_STR);
        $prep->execute();
        if ($prep->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

//Get user info
    public function getUserInformations($username) {
        $q = "SELECT uuid, username, email, permission, date FROM `user` WHERE username = :username";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':username', $username, PDO::PARAM_STR);
        $prep->execute();
        $result = $prep->fetch(PDO::FETCH_ASSOC);
        return new User($result["uuid"], $result["username"], $result["email"], $result["permission"], $result["date"]);
    }

//Get user password
    public function getUserPassword($username) {
        $q = "SELECT password FROM `user` WHERE username = :username";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':username', $username, PDO::PARAM_STR);
        $prep->execute();
        $result = $prep->fetch(PDO::FETCH_ASSOC);
        return $result["password"];
    }


//Create user
public function createUser($username, $email, $password)
{
    $req = "INSERT INTO `user` (`username`, `email`, `password`) VALUES (:username, :email, :password)";
    $prep = bdd::$monPdo->prepare($req);
    $prep->bindValue(':username', $username, PDO::PARAM_STR);
    $prep->bindValue(':email', $email, PDO::PARAM_STR);
    $prep->bindValue(':password', $password, PDO::PARAM_STR);
    $prep->execute();
}


//---------- CLASSES OBJET ----------//
}

class User {
    public $uuid;
    public $username;
    public $email;
    public $permission;
    public $date;

    public function __construct($uuid, $username, $email, $permission, $date) {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->email = $email;
        $this->permission = $permission;
        $this->date = $date;
    }
}

?>

