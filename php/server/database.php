

<?php

//---------- DATA ACCESS LAYER ----------//

//---CONNEXION BDD---//
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
    //fonction statique permet d'éviter l'instanciation à chaque appel
    public static function getBdd(){
        if (bdd::$getbdd_==null){
            bdd::$getbdd_ = new bdd();
        }
        return bdd::$getbdd_;
    }



//---REQUETES---//

//CHECK IF USER EXISTS//
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

//GET USER INFOS//
    public function getUserInformations($username) {
        $q = "SELECT uuid, username, email, permission, date FROM `user` WHERE username = :username";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':username', $username, PDO::PARAM_STR);
        $prep->execute();
        $result = $prep->fetch(PDO::FETCH_ASSOC);
        return new User($result["uuid"], $result["username"], $result["email"], $result["permission"], $result["date"]);
    }

//GET USER PASSWORD//
    public function getUserPassword($username) {
        $q = "SELECT password FROM `user` WHERE username = :username";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':username', $username, PDO::PARAM_STR);
        $prep->execute();
        $result = $prep->fetch(PDO::FETCH_ASSOC);
        return $result["password"];
    }

//CREATE USER// 
public function createUser($username, $email, $password)
{
    $req = "INSERT INTO `user` (`username`, `email`, `password`) VALUES (:username, :email, :password)";
    $prep = bdd::$monPdo->prepare($req);
    $prep->bindValue(':username', $username, PDO::PARAM_STR);
    $prep->bindValue(':email', $email, PDO::PARAM_STR);
    $prep->bindValue(':password', $password, PDO::PARAM_STR);
    $prep->execute();
}


}


?>
