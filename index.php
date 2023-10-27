<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $birthday = $_POST['birthday'];

    echo '<img src="' . $uploadFile . '" alt="Image Uploaded">'; // Afficher l'image

    ?> 
    <!-- <form action="index.php" method="post">
    <button type="submit" name=delete id="delete" value="delete">Supprimer l'image</button> 
    </form> -->
    <?php



    echo '<p>Nom : ' . $lastname . '</p>';
    echo '<p>Prénom : ' . $firstname . '</p>';
    echo '<p>Date de naissance : ' . $birthday . '</p>';
    
    
}

?>

<a href="form.php">Retour au formulaire</a>

