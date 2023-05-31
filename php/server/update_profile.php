<?php

if (isset($_POST["update"])) {
    if (isset($_POST["oldpassword"])) {

        if (isset($_POST["email"])) {
            
        }

        if (isset($_POST["newpassword"])) {
            if (isset($_POST["confirmnewpassword"])) {
                // Modifier mot de passe
                $hash = password_hash(htmlspecialchars($_POST["confirmnewpassword"]), PASSWORD_BCRYPT);
            }
        }

    
        if (isset($_FILES['profile-picture']) && $_FILES['profile-picture']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['profile-picture'];
            // Vérifier le type du fichier
            $fileType = exif_imagetype($file['tmp_name']);
            if ($fileType === IMAGETYPE_PNG) {
                // Définir le chemin de destination pour enregistrer le fichier
                $destination = 'image/avatar/' . $_SESSION["uuid"];
                // Déplacer le fichier téléchargé vers le dossier de destination
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    // Le fichier a été enregistré avec succès
                    echo "Le fichier a été enregistré.";
                    echo "<script>console.log('test4')</script>";

                } else {
                    // Une erreur s'est produite lors de l'enregistrement du fichier
                    echo "Une erreur s'est produite lors de l'enregistrement du fichier.";
                    echo "<script>console.log('test3')</script>";

                }
            } else {
                // Le fichier n'est pas au format PNG
                echo "Le fichier doit être au format PNG.";
                echo "<script>console.log('test2')</script>";

            }
        } else {
            // Le champ de fichier n'a pas été envoyé ou une erreur s'est produite
            echo "Veuillez sélectionner un fichier PNG.";
            echo "<script>console.log('test')</script>";
        }
    }
    
}