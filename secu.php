<?php

$errors = [];
// var_dump($_FILES);
if($_SERVER["REQUEST_METHOD"] === "POST" ){ 
    // chemin vers un dossier sur le serveur qui va recevoir les fichiers transférés (attention ce dossier doit être accessible en écriture)
    $uploadDir = uniqid('public/uploads/');
  
    
    // le nom de fichier sur le serveur est celui du nom d'origine du fichier sur le poste du client (mais d'autres stratégies de nommage sont possibles)
    // $uploadFile = $uploadDir . uniqid(basename($_FILES['avatar']['name'])) . '.jpg'; 
    $uploadFile = $uploadDir . (basename($_FILES['avatar']['name'])) ; 
    // echo PHP_EOL. $uploadFile . PHP_EOL;

    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    // Les extensions autorisées
    $authorizedExtensions = ['jpg','png','gif','webp'];
    // Le poids max géré par PHP par défaut est de 2M
    $maxFileSize = 1000000;

    if( (!in_array($extension, $authorizedExtensions))){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Png ou gif ou webp !';
    }

    /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
    if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
    $errors[] = "Votre fichier doit faire moins de 1M !";
    }

    if(!isset($_POST['lastname'])||empty(trim($_POST['lastname']))){
        $errors[]='Le nom est obligatoire';
    }
    
    if(!isset($_POST['firstname'])||empty(trim($_POST['firstname']))){
        $errors[]='Le prenom est obligatoire';
    }
    
    if(!isset($_POST['birthday'])||empty(trim($_POST['birthday']))){
        $errors[]='La date d\'anniversaire est obligatoire';
    }
    //modif delete
    // $delateUploadFile = $_POST['avatar'];

    // if (!file_exists($delateUploadFile) && unlink($delateUploadFile)){
    // echo 'Une erreur s\'est produite lors de la suppression de l\'image.';
    // }

    if (empty($errors)){
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
        require 'index.php';    
    }
    else {
        ?>
        <div> 
            <p>Votre formulaire comporte des erreurs : </p>
        </div>
        <ul> <?php
        foreach($errors as $error){ ?>
            <li><?= $error ?></li>
            <?php } ?>
        </ul> <?php 
    }

}



?>