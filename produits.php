<?php

session_start();

$connexion = mysqli_connect("localhost","root","","boutique");

$requete = "SELECT * FROM `articles` ORDER BY date DESC";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);

$requete1 = "SELECT * FROM `articles` ORDER BY prix ASC";
$query1 = mysqli_query($connexion, $requete1);
$resultat1 = mysqli_fetch_all($query1);

$requete2 = "SELECT * FROM `articles` ORDER BY prix DESC";
$query2 = mysqli_query($connexion, $requete2);
$resultat2 = mysqli_fetch_all($query2);


    // $requete_cat = "SELECT DISTINCT a.id_categorie, c.nom FROM articles AS a INNER JOIN categories AS c ON a.id_categorie = c.id";
    // $query_cat = mysqli_query($connexion,$requete_cat);
    // $resultat_cat = mysqli_fetch_all($query_cat);


$requete_cat = "SELECT * FROM categories";
$query_cat = mysqli_query($connexion,$requete_cat);
$res_cat = mysqli_fetch_all($query_cat);
var_dump($res_cat);




    
if(isset($_GET["cat"]) && isset($_GET["type"])){
    $idcat = $_GET["cat"];
    $idtype = $_GET["type"];
    $requete = "SELECT * FROM articles WHERE id_categorie = '$idcat' AND id_type = '$idtype'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    var_dump($resultat);
} elseif(isset($_GET["cat"])){
    $idcat = $_GET["cat"];
    $idtype = "0";
    $requete = "SELECT * FROM articles WHERE id_categorie = '$idcat'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    var_dump($resultat);
} else {
    $erreur = "erreur";
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
    </head>
    <body>
    <main>
        <section>


            <?php foreach($res_cat as $categories):
                
                var_dump($categories);
                $idcat = $categories[0];
                $namecat = $categories[1];
                echo "<a href=\"produits.php?cat=$idcat\">$namecat</a></br>";
                $requete_typ = "SELECT DISTINCT a.id_type, t.nom FROM articles a INNER JOIN types t ON a.id_type = t.id WHERE id_categorie = '".$idcat."'";
                $query_typ = mysqli_query($connexion,$requete_typ);
                $res_typ = mysqli_fetch_all($query_typ);
                // var_dump($res_typ);
                foreach($res_typ as $types){
                    $idtype = $types[0];
                    $nametype = $types[1];
                    echo "<a href=\"produits.php?cat=$idcat&type=$idtype\">$nametype</a></br>";
                } 
                          
            endforeach; ?>

        </section> 
    </main>
    </body>
</html>






























