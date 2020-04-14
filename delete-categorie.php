<?php
    
    $connexion = mysqli_connect("localhost", "root", "", "boutique");
    $delete = $_GET["id"];
    $requete = "DELETE FROM categories WHERE id = '$delete'";
    $query = mysqli_query($connexion, $requete);
    header("Location: gestion-categorie.php");
    die(); 

?>