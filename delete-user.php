<?php

    $connexion = mysqli_connect("localhost", "root", "", "boutique");
    $delete = $_GET["id"];
    $requete = "DELETE FROM utilisateurs WHERE id = '$delete'";
    $query = mysqli_query($connexion, $requete);
    header("Location:edit-user-admin.php");
    die();

?>
