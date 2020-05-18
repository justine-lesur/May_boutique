<?php


        $connexion = mysqli_connect("localhost","root","","boutique");
        $id = $_GET["id"];
        $requete_goadmin = "UPDATE utilisateurs SET id_droits = '10' WHERE id = '$id'";
        $query_goadmin = mysqli_query($connexion, $requete_goadmin);
        header("Location:edit-user-admin.php");
    


