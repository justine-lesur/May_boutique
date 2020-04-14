<?php


$connexion = mysqli_connect("localhost","root","","boutique");
$id = $_GET["id"];
$requete_downuser = "UPDATE utilisateurs SET id_droits = '1' WHERE id = '$id'";
$query_downuser = mysqli_query($connexion, $requete_downuser);
header("Location:edit-user-admin.php");
    
?>

