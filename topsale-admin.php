<?php

session_start();

ob_start();


////////// VENTES //////////

$connexion = mysqli_connect("localhost","root","","boutique");
$requete_achat = "SELECT id, nom FROM articles ORDER BY achats DESC LIMIT 5";
$query_achat = mysqli_query($connexion,$requete_achat);
$resultat_achat = mysqli_fetch_all($query_achat);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<?php

// if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): ?>

        <main class="main-container">
            <section class="sec-container">
                <nav class="nav-container">
                    <ul class="ul-container">
                        <a href="admin.php" class="lien-nav lien-nav2 lien-lonely2"><li>Admin</li></a>
                        <a href="creer-produit.php" class="lien-nav lien-nav2 lien-lonely3"><li>Créer un produit</li></a>
                        <a href="edit-user-admin.php" class="lien-nav lien-nav2 lien-lonely4"><li>Gestion utilisateurs</li></a>
                        <a href="gestion-categorie.php" class="lien-nav lien-nav2 lien-lonely5"><li>Gestion catégories</li></a>
                        <a href="" class="lien-nav lien-nav2 lien-lonely6"><li>Gestion commandes</li></a>
                        <a href="topsale-admin.php" class="lien-nav lien-lonely"><li>Top 5 ventes</li></a>
                    </ul>
                </nav>
                <section class="sec-container2">
<!-- ////////// TABLEAU VENTES ////////// -->
                    <div id="font-table-topvente"></div>
                    <table id="table-topvente">
                        <thead>
                            <div class="box-title">
                                <h1 class="title-admin">TOP 5 des meilleures ventes</h1>
                            </div>
                        </thead>
                        <tbody>
                            <img src="img/t1.png" id="t1-img" alt="top1">
<?php foreach($resultat_achat as $achat): ?>
                            <tr id="vente-tr">
                                <td><?php echo $achat[1] ?></td>
                            </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </section>
        </main>
<?php
ob_end_flush();
// endif; ?>

    </body>
</html>