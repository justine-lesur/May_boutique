<?php
    $connexion = mysqli_connect("localhost", "root", "", "boutique");
    $delete = $_GET["id"];
    $requete = "DELETE FROM articles WHERE id = '$delete'";
    $query = mysqli_query($connexion, $requete);
    header("Location:admin.php");
    die();
    
    

    $requete = "DELETE FROM utilisateurs"

?>
