<?php
/* Inclure le fichier config */
require_once("./config.php");

$pdo=bdd::getBdd();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    /* valeur des text box postées dans la bdd */
    $id = trim($_POST["id"]);
    $username=trim($_POST["username"]);
    $email=trim($_POST["email"]);
    $password=trim($_POST["password"]);
    $permission=trim($_POST["permission"]);
    $date=trim($_POST["date"]);

    /*passage des valeurs utilisateur en paramêtres de la requête*/
    $pdo->insert($id, $username, $email, $password, $permission, $date);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Créer un utilisateur</h2>
                    <p>Veuillez remplir les champs pour créer un nouvel utilisateur</p>


                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        
                    <div class="form-group">
                            <label>Nom d'utilisateur</label>
                            
                            <input type="text" name="username" class="form-control">
                            <span class="invalid-feedback"></span>
                    </div>        
                            <!-- if $POST[..]... INSERT INTO ... -->
                            
                          
                            <span class="invalid-feedback"></span>
                </div>
                <br>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                        <span class="invalid-feedback"></span>  
                    </div>
                <br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control ">
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group">
                            <label>Permission</label>
                            <input type="select" name="permission" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" name="date" class="form-control"  min="0" max="3">
                            <span class="invalid-feedback"></span>
                        </div>

                        <hr/>
                        <input type="submit" class="btn btn-primary" value="Enregistrer" name="Enregistrer">

                        <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                        <hr/>
                        <?php if (isset($_POST["Enregistrer"])){
                            echo '<div class="alert alert-success">

                            <p>Etudiant ajouté avec succès</p>
                               <p> 
                                  <a href="index.php" class="btn btn-secondary">OK</a>
                               </p>
                            </div>';}
                          ?>
                           

                    </form>          
                </div>
            </div>        
        </div>
    </div>
</body>
</html>