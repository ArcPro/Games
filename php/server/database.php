

<?php

include_once "models.php";
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

//------REQUETES------//

// Get total members
    public function getTotalMembers() {
        $q = "SELECT COUNT(*) FROM `user`";
        $stmt = bdd::$monPdo->prepare($q); // Préparer la requête
        $stmt->execute(); // Exécuter la requête préparée
        $totalMembers = $stmt->fetchColumn(); // Récupérer le résultat de la requête
        return $totalMembers;
    }


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
        $q = "SELECT uuid, username, email, permission, date, avatar FROM `user` WHERE username = :username";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':username', $username, PDO::PARAM_STR);
        $prep->execute();
        $result = $prep->fetch(PDO::FETCH_ASSOC);
        return new User($result["uuid"], $result["username"], $result["email"], $result["permission"], $result["date"], $result["avatar"]);
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
public function createUser($uuid, $username, $email, $password)
{
    $req = "INSERT INTO `user` (`uuid`, `username`, `email`, `password`) VALUES (:uuid, :username, :email, :password)";
    $prep = bdd::$monPdo->prepare($req);
    $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
    $prep->bindValue(':username', $username, PDO::PARAM_STR);
    $prep->bindValue(':email', $email, PDO::PARAM_STR);
    $prep->bindValue(':password', $password, PDO::PARAM_STR);
    $prep->execute();
}


//GET COMMENT BY ID//
public function getCommentsByID($uuid)
{
    $req = "SELECT user.uuid, user.username, user.avatar, comment.message, comment.date 
            FROM `comment` 
            JOIN `user` ON user.uuid=comment.userUuid 
            WHERE comment.profileUuid = :uuid AND comment.visibility = 0 ORDER BY comment.date DESC";
    $prep = bdd::$monPdo->prepare($req);
    $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll(PDO::FETCH_ASSOC);
}

//GET PROFILE
public function getProfile($uuid) 
{
    $q = "SELECT username, permission, date, avatar FROM `user` WHERE uuid = :uuid";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
        $prep->execute();
        $globalUserInfos = $prep->fetch(PDO::FETCH_ASSOC);

    $q = "SELECT count(*) as nbDuel FROM `duel` WHERE user1Uuid = :uuid OR user2Uuid = :uuid";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
        $prep->execute();
        $nbDuel = $prep->fetch(PDO::FETCH_ASSOC);
    $q = "SELECT count(*) as nbWin FROM `duel` WHERE user1Uuid = :uuid OR user2Uuid = :uuid AND winnerUuid = :uuid";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
        $prep->execute();
        $nbWin = $prep->fetch(PDO::FETCH_ASSOC);
        return new Profile($uuid, $globalUserInfos["username"], $globalUserInfos["permission"], $globalUserInfos["date"], $globalUserInfos["avatar"], $nbDuel["nbDuel"], $nbWin["nbWin"]);
}

public function sendComment($profileUuid, $userUuid, $message) {
    $req = "INSERT INTO `comment` (`userUuid`, `profileUuid`, `message`) VALUES (:userUuid, :profileUuid, :message)";
    $prep = bdd::$monPdo->prepare($req);
    $prep->bindValue(':userUuid', $userUuid, PDO::PARAM_STR);
    $prep->bindValue(':profileUuid', $profileUuid, PDO::PARAM_STR);
    $prep->bindValue(':message', $message, PDO::PARAM_STR);
    $prep->execute();
}

//--- FRIENDS SYSTEM ---//

//Add friend
public function addFriend($user1Id, $user2Id) {
    $req = "INSERT INTO `friends` (`user1`, `user2`) VALUES (:user1Id, :user2Id)";
    $prep = bdd::$monPdo->prepare($req);
    $prep->bindValue(':user1Id', $user1Id, PDO::PARAM_STR);
    $prep->bindValue(':user2Id', $user2Id, PDO::PARAM_STR);
    $prep->execute();
}



//












}

$pdo=bdd::getBdd();

?>
