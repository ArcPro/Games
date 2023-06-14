

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

//Check if request exists
public function checkFriendRequestExist($sender, $reciever){
    $sql = "SELECT * FROM friend_request WHERE sender = :sender AND receiver = :receiver";
    $prep = bdd::$monPdo ->prepare($sql);
    $prep->BindValue(':sender', $sender, PDO::PARAM_STR);
    $prep->BindValue(':reciever', $reciever, PDO::PARAM_STR);
}

//New friend request
public function newFriendRequest($sender, $reciever){
    $sql = "INSERT INTO friend_request (sender, receiver) VALUES (:sender, :receiver)";
    $prep = bdd::$monPdo->prepare($sql);
    $prep->bindValue(':sender',$sender, PDO::PARAM_STR);
    $prep->bindValue(':reciever', $reciever, PDO::PARAM_STR);
    $prep->execute();
}

//Reject friend request
public function rejectFriendRequest($id) {
    $sql = "DELETE FROM friend_request WHERE id = :id";;
    $prep = bdd::$monPdo->prepare($sql);
    $prep->bindValue(':id', $id, PDO::PARAM_STR);
    $prep->execute();
}

//Add friend
public function addFriend($user1, $user2) {
    $sql = "INSERT INTO friends_list (user1, user2) VALUES (:user1, :user2)";
    $prep = bdd::$monPdo->prepare($sql);
    $prep->bindValue(':user1', $user1, PDO::PARAM_STR);
    $prep->bindValue(':user2', $user2, PDO::PARAM_STR);
    $prep->execute();
}





//--- GAME SYSTEM ---//

public function verifGameStatus($uuid) {
    $q = "SELECT user1Uuid, user2Uuid, duelStatus, winnerUuid, date FROM `duel` WHERE user1Uuid = :uuid OR user2Uuid = :uuid ORDER BY date desc";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
        $prep->execute();
        $gameStatus = $prep->fetch(PDO::FETCH_ASSOC);
    return $gameStatus;
}

public function createDuel($uuid) {
    include_once "utils.php";
    $duelUuid = format_uuidv4(random_bytes(16));
    $req = "INSERT INTO `duel` (`uuid`, `user1Uuid`) VALUES (:duelUuid, :uuid)";
    $prep = bdd::$monPdo->prepare($req);
    $prep->bindValue(':duelUuid', $duelUuid, PDO::PARAM_STR);
    $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
    $prep->execute();
}

public function changeDuelStatus($uuid, $status) {
    include_once "utils.php";
    $req = "UPDATE duel SET duelStatus = :status WHERE user1Uuid = :uuid OR user2Uuid = :uuid AND duelStatus = 'WAITING';";
    $prep = bdd::$monPdo->prepare($req);
    $prep->bindValue(':status', $status, PDO::PARAM_STR);
    $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
    $prep->execute();
}

public function existingDuel($uuid) {
    $q = "SELECT uuid FROM `duel` WHERE user2Uuid IS NULL AND duelStatus = 'WAITING' AND user1Uuid != :uuid";
        $prep = bdd::$monPdo->prepare($q);
        $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
        $prep->execute();
        $existingDuel = $prep->fetch(PDO::FETCH_ASSOC);
    return $existingDuel;
}

public function joinDuel($uuid, $duelUuid) {
    include_once "utils.php";
    $req = "UPDATE duel SET duelStatus = :status, user2Uuid = :uuid WHERE uuid = :duelUuid AND user2Uuid IS NULL AND duelStatus = 'WAITING';";
    $prep = bdd::$monPdo->prepare($req);
    $prep->bindValue(':status', "PLAYING", PDO::PARAM_STR);
    $prep->bindValue(':uuid', $uuid, PDO::PARAM_STR);
    $prep->bindValue(':duelUuid', $duelUuid, PDO::PARAM_STR);
    $prep->execute();
}


//












}

$pdo=bdd::getBdd();

?>
