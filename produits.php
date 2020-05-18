<?php

session_start();

$connexion = mysqli_connect("localhost","root","","boutique");

if(!isset($_GET["q"])){
    $requete_cat = "SELECT * FROM categories WHERE id ='".$_GET["cat"]."'";
    $query_cat = mysqli_query($connexion,$requete_cat);
    $res_cat = mysqli_fetch_all($query_cat);
}
// var_dump($res_cat);
                                        /*////////// BARRE DE RECHERCHE //////////*/

$requete1 = "SELECT nom FROM articles ORDER BY id DESC";
$query1 = mysqli_query($connexion, $requete1);
if(isset($_GET['q']) && !empty($_GET['q'])) {
   $q = filter_input(INPUT_GET,"q",FILTER_SANITIZE_SPECIAL_CHARS);
   $idcat = "0";
   if(strlen($q) >= 3){
   $requete = "SELECT * FROM articles WHERE nom LIKE '%".$q."%' ORDER BY id DESC";
   $query = mysqli_query($connexion,$requete);
   $resultat_art = mysqli_fetch_all($query);
   } else {
       $error = "Votre recherche doit comporter 3 caractères minimum";
   }
}

if(isset($_GET['q']) && $_GET['q'] == ""){
    $error = "Vous devez entrer votre requete dans la barre de recherche";   
}



                                        /*/////////// REQUETE AFFICHER NOM PRODUIT BANDEROLLE //////////*/


if(isset($_GET["cat"]) && isset($_GET["type"])){
    $idcat = $_GET["cat"];
    $idtype = $_GET["type"];
    $requete2 = "SELECT DISTINCT a.id_categorie, a.id_type, c.id, c.nom, t.id, t.nom FROM articles a INNER JOIN categories c ON a.id_categorie = c.id INNER JOIN types t ON a.id_type = t.id WHERE id_categorie = '$idcat' AND id_type = '$idtype'";
    $query2 = mysqli_query($connexion, $requete2);
    $resultat2 = mysqli_fetch_all($query2);
    // var_dump($resultat2);
} elseif(isset($_GET["cat"])){
    $idcat = $_GET["cat"];
    $idtype = "0";
    $requete2 = "SELECT DISTINCT a.id_categorie, c.id, c.nom FROM articles a INNER JOIN categories c ON a.id_categorie = c.id WHERE id_categorie = '$idcat'";
    $query2 = mysqli_query($connexion, $requete2);
    $resultat2 = mysqli_fetch_all($query2);
    // var_dump($resultat2);
}


                                        /*/////////// REQUETE POUR AFFICHER LES PRODUITS //////////*/


if(isset($_GET["cat"]) && isset($_GET["type"])){
    $idcat = $_GET["cat"];
    $idtype = $_GET["type"];
    $requete = "SELECT * FROM articles WHERE id_categorie = '$idcat' AND id_type = '$idtype'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    // var_dump($resultat);

    $requete_date = "SELECT * FROM articles WHERE id_categorie = '$idcat' AND id_type = '$idtype' ORDER BY date DESC";
    $query_date = mysqli_query($connexion, $requete_date);
    $resultat_date = mysqli_fetch_all($query_date);

    $requete_minprice = "SELECT * FROM articles WHERE id_categorie = '$idcat' AND id_type = '$idtype' ORDER BY prix ASC";
    $query_minprice = mysqli_query($connexion, $requete_minprice);
    $resultat_minprice = mysqli_fetch_all($query_minprice);

    $requete_maxprice = "SELECT * FROM articles WHERE id_categorie = '$idcat' AND id_type = '$idtype' ORDER BY prix DESC";
    $query_maxprice = mysqli_query($connexion, $requete_maxprice);
    $resultat_maxprice = mysqli_fetch_all($query_maxprice);

} elseif(isset($_GET["cat"])){
    $idcat = $_GET["cat"];
    $idtype = "0";
    $requete = "SELECT * FROM articles WHERE id_categorie = '$idcat'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    // var_dump($resultat);

    $requete_date = "SELECT * FROM articles WHERE id_categorie = '$idcat' ORDER BY date DESC";
    $query_date = mysqli_query($connexion, $requete_date);
    $resultat_date = mysqli_fetch_all($query_date);

    $requete_minprice = "SELECT * FROM articles WHERE id_categorie = '$idcat' ORDER BY prix ASC";
    $query_minprice = mysqli_query($connexion, $requete_minprice);
    $resultat_minprice = mysqli_fetch_all($query_minprice);

    $requete_maxprice = "SELECT * FROM articles WHERE id_categorie = '$idcat' ORDER BY prix DESC";
    $query_maxprice = mysqli_query($connexion, $requete_maxprice);
    $resultat_maxprice = mysqli_fetch_all($query_maxprice);

}


?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>May - Boutique de vêtements en ligne</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body> 
<?php if(isset($resultat_art)): ?>
    <section id="accueil3">
        <?php require('header.php'); ?>
    </section>
        <main>
            <section>
                <!-- formulaire pour la barre de recherche -->
                <form method="GET" id="form-search">
                    <button type="submit" id="but-search-q"><img src="img/icon_search.png" id="img-search" alt="search"></button>
                    <input type="search" name="q" id="inp-q" placeholder="Recherche de produits" />
                </form>
                <!-- j'affiche les produits de la barre de recherche -->
                
                <h2 id="tit-for-search"><?php echo "Résultat pour la recherche : ".$_GET["q"]."..."; ?></h2>
                <section class="section-prod">
                    <?php foreach($resultat_art as $prod): ?>
                        <a href="produit.php?id=<?php echo $prod[0] ?>" class="article-prod">
                            <img src="<?php echo $prod[4]; ?>" class="img-produits" alt="">
                            <div class="box-h4-pprod">
                                <h4 class="title4-prod"><?php echo $prod[1]; ?></h4>                                
                                <p class="para-prod"><?php echo $prod[6]." €"; ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </section>
            </section> 
        </main>
<?php else: ?>
	<section class="accueil2">
		<?php
            require('header.php');
            if(isset($error)): ?>
                <div id="erreur-acc2"><?php echo $error; ?></div>
            <?php endif; ?>
		<h1 class="maystore2">
            <!-- Pour afficher le titre d'en-tête  -->
            <?php if(isset($_GET["cat"]) && isset($_GET["type"])){
                echo "#".$resultat2[0][3]."".$resultat2[0][5];
            } else if(isset($_GET["cat"])){
                echo "#".$resultat2[0][2];
            } ?>
        </h1>
    </section>
    
    <main>
        <section>
            <section>
                <form method="GET" id="form-search">
                    <button type="submit" id="but-search-q"><img src="img/icon_search.png" id="img-search" alt="search"></button>
                    <input type="search" name="q" id="inp-q" placeholder="Recherche de produits" />
                </form>
            </section>
            <?php
            // foreach($res_cat as $categories):
                
            //     // var_dump($categories);
            //     $idcat = $categories[0];
            //     $namecat = $categories[1];
            //     echo "<a href=\"produits.php?cat=$idcat\">$namecat</a></br></br>";
            //     $requete_typ = "SELECT DISTINCT a.id_type, t.nom FROM articles a INNER JOIN types t ON a.id_type = t.id WHERE id_categorie = '".$idcat."'";
            //     $query_typ = mysqli_query($connexion,$requete_typ);
            //     $res_typ = mysqli_fetch_all($query_typ);
            //     // var_dump($res_typ);
            //     foreach($res_typ as $types){
            //         $idtype = $types[0];
            //         $nametype = $types[1];
            //         echo "<a href=\"produits.php?cat=$idcat&type=$idtype\">$nametype</a></br>";
            // }
            // endforeach; 
            ?>
            <?php 
            if(isset($_GET["cat"]) && isset($_GET["type"])): ?>
                <form action="" method="post" class="form-prodorder">
                    <select name="selectorder" class="selectorder">
                        <option value="recent">Plus Récent</option>
                        <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"){ echo "selected"; } ?> value="prixmini">Plus Bas Prix</option>
                        <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"){ echo "selected"; } ?> value="prixmax">Prix Le Plus Élevé</option>
                        <input type="submit" value="Trier" class="but-trier">    
                    </select>
                </form>
                <section class="section-prod">
                    <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "recent"):
                        foreach($resultat_date as $produits): ?>    
                            <a href="produit.php?id=<?php echo $produits[0] ?>" class="article-prod">
                                <img src="<?php echo $produits[4]; ?>" class="img-produits" alt="">
                                <div class="box-h4-pprod">
                                    <h4 class="title4-prod"><?php echo $produits[1]; ?></h4>
                                    <p class="para-prod"><?php echo $produits[6]." €"; ?></p>
                                </div>
                            </a>
                        <?php endforeach;
                    elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"):
                        foreach($resultat_minprice as $produits): ?>    
                            <a href="produit.php?id=<?php echo $produits[0] ?>" class="article-prod">
                                <img src="<?php echo $produits[4]; ?>" class="img-produits" alt="">
                                <div class="box-h4-pprod">
                                    <h4 class="title4-prod"><?php echo $produits[1]; ?></h4>
                                    <p class="para-prod"><?php echo $produits[6]." €"; ?></p>
                                </div>
                            </a>
                        <?php endforeach;
                    elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"):
                        foreach($resultat_maxprice as $produits): ?>    
                            <a href="produit.php?id=<?php echo $produits[0] ?>" class="article-prod">
                                <img src="<?php echo $produits[4]; ?>" class="img-produits" alt="">
                                <div class="box-h4-pprod">
                                    <h4 class="title4-prod"><?php echo $produits[1]; ?></h4>
                                    <p class="para-prod"><?php echo $produits[6]." €"; ?></p>
                                </div>
                            </a>
                        <?php endforeach;
                    else:
                        foreach($resultat as $produits): ?>    
                            <a href="produit.php?id=<?php echo $produits[0] ?>" class="article-prod">
                                <img src="<?php echo $produits[4]; ?>" class="img-produits" alt="">
                                <div class="box-h4-pprod">
                                    <h4 class="title4-prod"><?php echo $produits[1]; ?></h4>
                                    <p class="para-prod"><?php echo $produits[6]." €"; ?></p>
                                </div>
                            </a>
                        <?php endforeach; ?>
                </section>
                    <?php 
                    endif;
            elseif(isset($_GET["cat"])):
                $_GET["type"] = "0"; ?>
                <form action="" method="post" class="form-prodorder">
                    <select name="selectorder" class="selectorder">
                        <option value="recent">Plus Récent</option>
                        <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"){ echo "selected"; } ?> value="prixmini">Plus Bas Prix</option>
                        <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"){ echo "selected"; } ?> value="prixmax">Prix Le Plus Élevé</option>
                        <input type="submit" value="Trier" class="but-trier">    
                    </select>
                </form>
                <section class="section-prod">
                    <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "recent"):
                        foreach($resultat_date as $produits): ?>    
                            <a href="produit.php?id=<?php echo $produits[0] ?>" class="article-prod">
                                <img src="<?php echo $produits[4]; ?>" class="img-produits" alt="">
                                <div class="box-h4-pprod">
                                    <h4 class="title4-prod"><?php echo $produits[1]; ?></h4>
                                    <p class="para-prod"><?php echo $produits[6]." €"; ?></p>
                                </div>
                            </a>
                        <?php endforeach;
                    elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"):
                        foreach($resultat_minprice as $produits): ?>    
                            <a href="produit.php?id=<?php echo $produits[0] ?>" class="article-prod">
                                <img src="<?php echo $produits[4]; ?>" class="img-produits" alt="">
                                <div class="box-h4-pprod">
                                    <h4 class="title4-prod"><?php echo $produits[1]; ?></h4>
                                    <p class="para-prod"><?php echo $produits[6]." €"; ?></p>
                                </div>
                            </a>
                        <?php endforeach;
                    elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"):
                        foreach($resultat_maxprice as $produits): ?>    
                            <a href="produit.php?id=<?php echo $produits[0] ?>" class="article-prod">
                                <img src="<?php echo $produits[4]; ?>" class="img-produits" alt="">
                                <div class="box-h4-pprod">
                                    <h4 class="title4-prod"><?php echo $produits[1]; ?></h4>
                                    <p class="para-prod"><?php echo $produits[6]." €"; ?></p>
                                </div>
                            </a>
                        <?php endforeach;
                    else:
                        foreach($resultat as $produits): ?>    
                        <a href="produit.php?id=<?php echo $produits[0] ?>" class="article-prod">
                            <img src="<?php echo $produits[4]; ?>" class="img-produits" alt="">
                            <div class="box-h4-pprod">
                                <h4 class="title4-prod"><?php echo $produits[1]; ?></h4>
                                <p class="para-prod"><?php echo $produits[6]." €"; ?></p>
                            </div>
                        </a>
                        <?php endforeach; ?>
                </section>
                    <?php 
                    endif;
            endif;
            ?>
        </section> 
    </main>
            <?php endif; ?>
    <script>
    let accueil = document.querySelector(".accueil2");
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
    accueil.style.backgroundColor = getRandomColor();
    </script>
<?php require("footer.php"); ?>    




























