
<?php

//classe static = pas instanciation 

// --------------------------- D E C L A R A T I O N   DE   L A   C L A S S E    BDD -------------------------//
class bdd {

    private static $bdd = "mysql:host=localhost;dbname=games";
    private static $user = "root";
    private static $mdp = "";
    private static $monPdo;
    private static $getbdd_=null;
    private function __construct(){
    
    try{
        bdd::$monPdo = new PDO(bdd::$bdd, bdd::$user, bdd::$mdp); //en objet $monPdo a 3 PARAMETRES : $bdd , $user et $mdp 

    }catch(Exception $e){
        throw new Exception($e->getMessage());
    }
   
   
    }

    public static function getBdd(){
        if (bdd::$getbdd_==null){
            bdd::$getbdd_ = new bdd();
        }
        return bdd::$getbdd_;
    }

//test

public function insert($id, $username, $email, $password, $permission, $date)
{
    $req="INSERT INTO `user`(`uuid`, `username`, `email`, `password`, `permission`, `date`) VALUES (:uuid, :username, :email, :password, :permission, :date)";
    $prep = bdd ::$monPdo->prepare($req);
    $prep-> bindValue(':uuid',$id,PDO::PARAM_INT);
    $prep-> bindValue(':username',$username,PDO::PARAM_STR);
    $prep-> bindValue(':email',$email,PDO::PARAM_STR);
    $prep-> bindValue(':password',$password,PDO::PARAM_STR);
    $prep-> bindValue(':permission',$permission, PDO::PARAM_STR);
    $prep-> bindValue(':date',$date, PDO::PARAM_STR); //------- ? VERIF ? 

    $prep->execute();
    $result=$prep->fetch(PDO::FETCH_ASSOC);
}

// // --------------------------- C R E A T E -------------------------//
// public function create($classe, $annee, $nom, $prenom, $nbstage) {
//     $req="INSERT INTO `etudiant` (`NUMCLASSE`, `NUMANNEE`,`NOMETUDIANT`,`PRENOMETUDIANT`,`NOMBRESTAGE`) Values (:numclasse,:numannee,:nometudiant,:prenometudiant,:nombrestage)";
//     $prep = bdd::$monPdo->prepare($req); //$req => requete prep
//     $prep->bindValue(':numclasse', $classe,PDO::PARAM_INT);//lier paramêtres à la requêtes; PARAM_INT = parametre de type INT ; PARAM_STR = parametre de type STRING ; 
//     $prep->bindValue(':numannee', $annee,PDO::PARAM_INT);//paramêtres = champs de la bdd 
//     $prep->bindValue(':nometudiant',$nom, PDO::PARAM_STR);
//     $prep->bindValue(':prenometudiant', $prenom,PDO::PARAM_STR);
//     $prep->bindValue(':nombrestage', $nbstage,PDO::PARAM_INT);
//     $prep->execute();   
//     $result=$prep->fetch(PDO::FETCH_ASSOC);}
        

// // --------------------------- D E L E T E -------------------------//
// public function delete($NUMETUDIANT) {
//     $req="DELETE FROM `etudiant` WHERE `NUMETUDIANT`=:numetudiant";
//     $prep = bdd::$monPdo->prepare($req); //$req => requete prep
//     $prep->bindValue(':numetudiant', $NUMETUDIANT,PDO::PARAM_INT);//lier paramêtres à la requêtes; PARAM_INT = parametre de type INT ; PARAM_STR = parametre de type STRING ; 
//     $prep->execute();   
//     $result=$prep->fetch(PDO::FETCH_ASSOC);} //suppression d'une ligne

// // --------------------------- R E A D -------------------------//
// public function select(){
//     $req="SELECT * FROM `etudiant`";
//     $prep = bdd::$monPdo->prepare($req); //$req => requete prep
//     $prep->execute();   
//     $ligne= $prep->fetchAll(PDO::FETCH_ASSOC);
//     return $ligne; }

// //----------------------------- SELECT BY ID -------------------//
// public function selectByID ($NUMETUDIANT){
//     $req="SELECT * FROM etudiant WHERE `NUMETUDIANT`=:numetudiant";
//     $prep=bdd::$monPdo->prepare($req);//requête devient préparée
//     $prep->bindParam(':numetudiant', $NUMETUDIANT ,PDO::PARAM_INT);
//     $prep->execute();
//     $ligne=$prep->fetch(PDO::FETCH_ASSOC);  
//     return $ligne; }


// // --------------------------- U P D A T E  -------------------------//
// public function update($NUMETUDIANT,$classe, $annee, $nom, $prenom, $nbstage) {
// //try catch avant requetes
    
//     $req="UPDATE `etudiant` SET `NUMCLASSE`=:numclasse,`NUMANNEE`=:numannee,`NOMETUDIANT`=:nometudiant,`PRENOMETUDIANT`=:prenometudiant,`NOMBRESTAGE`=:nombrestage WHERE `NUMETUDIANT`=:numetudiant";
//     $prep = bdd::$monPdo->prepare($req); //$req => requete prep
//     $prep->bindValue(':numetudiant', $NUMETUDIANT,PDO::PARAM_INT);
//     $prep->bindValue(':numclasse', $classe,PDO::PARAM_INT);//lier paramêtres à la requêtes; PARAM_INT = parametre de type INT ; PARAM_STR = parametre de type STRING ; 
//     $prep->bindValue(':numannee', $annee,PDO::PARAM_INT);//paramêtres = champs de la bdd 
//     $prep->bindValue(':nometudiant',$nom, PDO::PARAM_STR);
//     $prep->bindValue(':prenometudiant', $prenom,PDO::PARAM_STR);
//     $prep->bindValue(':nombrestage', $nbstage,PDO::PARAM_INT);
//     $prep->execute();   
//     $result=$prep->fetch(PDO::FETCH_ASSOC);}

}

?>

