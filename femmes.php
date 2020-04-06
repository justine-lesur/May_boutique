<?php

session_start();

$connexion = mysqli_connect("localhost","root","","boutique");
$requete = "SELECT * FROM `articles` WHERE id_categorie = 1 GROUP BY nom ORDER BY date DESC";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);

var_dump($resultat); ?>
<main>
    <section>
        <?php foreach($resultat as $article): ?>
            <article>
                    <a href=""><img src="<?php echo $article[5]?>" alt="mode"></a>
                    <h3><?php echo $article[1] ?></h3>
                    <span><?php echo $article[7] ?> €</span>
            </article>
        <?php endforeach; ?>
    </section> 
</main>






























