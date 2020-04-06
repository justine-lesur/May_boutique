<?php

session_start();

$connexion = mysqli_connect("localhost","root","","boutique");

$requete = "SELECT * FROM `articles` WHERE id_categorie = 1 GROUP BY nom ORDER BY date DESC";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);

$requete1 = "SELECT * FROM `articles` WHERE id_categorie = 1 GROUP BY nom ORDER BY prix ASC";
$query1 = mysqli_query($connexion, $requete1);
$resultat1 = mysqli_fetch_all($query1);

$requete2 = "SELECT * FROM `articles` WHERE id_categorie = 1 GROUP BY nom ORDER BY prix DESC";
$query2 = mysqli_query($connexion, $requete2);
$resultat2 = mysqli_fetch_all($query2);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
    </head>
<main>
    <section>
        <form action="" method="post">
            <select name="selectorder" id="essai">
                <option value="recent">Plus Récent</option>
                <option <?php if($_POST["selectorder"] == "prixmini"){ echo "selected"; } ?> value="prixmini">Plus Bas Prix</option>
                <option <?php if($_POST["selectorder"] == "prixmax"){ echo "selected"; } ?> value="prixmax">Prix Le Plus Élevé</option>
                <input type="submit">    
            </select>
        </form>
    </section>
    <section>
        <?php
        if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "recent"):
            foreach($resultat as $article): ?>
                <article>
                        <a href=""><img src="<?php echo $article[5]?>" alt="mode"></a>
                        <h3><?php echo $article[1] ?></h3>
                        <span><?php echo $article[7] ?> €</span>
                </article>
            <?php endforeach;
        elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"):
            foreach($resultat1 as $article): ?>
                <article>
                        <a href=""><img src="<?php echo $article[5]?>" alt="mode"></a>
                        <h3><?php echo $article[1] ?></h3>
                        <span><?php echo $article[7] ?> €</span>
                </article>
            <?php endforeach;
        elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"):
            foreach($resultat2 as $article): ?>
                <article>
                        <a href=""><img src="<?php echo $article[5]?>" alt="mode"></a>
                        <h3><?php echo $article[1] ?></h3>
                        <span><?php echo $article[7] ?> €</span>
                </article>
            <?php endforeach;
        else:
            foreach($resultat as $article): ?>
                <article>
                        <a href=""><img src="<?php echo $article[5]?>" alt="mode"></a>
                        <h3><?php echo $article[1] ?></h3>
                        <span><?php echo $article[7] ?> €</span>
                </article>
            <?php endforeach;
        endif; ?>
        ?>
        
    </section> 
</main>
</html>





























