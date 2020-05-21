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

if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): ?>
        <a href="index.php"><img src="img/53494.png" alt="leave" class="leave-admin"></a>
        <main class="main-container">
            <section class="sec-container">
                <nav class="nav-container">
                    <ul class="ul-container">
                        <a href="admin.php" class="lien-nav lien-nav2 lien-lonely2"><li>Admin</li></a>
                        <a href="creer-produit.php" class="lien-nav lien-nav2 lien-lonely3"><li>Créer un produit</li></a>
                        <a href="edit-user-admin.php" class="lien-nav lien-nav2 lien-lonely4"><li>Gestion utilisateurs</li></a>
                        <a href="gestion-categorie.php" class="lien-nav lien-nav2 lien-lonely5"><li>Gestion catégories</li></a>
                        <a href="display-commandes.php" class="lien-nav lien-nav2 lien-lonely6"><li>Gestion commandes</li></a>
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

elseif(empty($_SESSION["login"]) || $_SESSION["id_droits"] == 1): ?>
    <section class="bg-error">
        <article class="art-error">
            <div class="div-errtitle">
                <h4 class="error-title">Vous n'avez pas accès à cette page</h4>
            </div>
            <div class="div-erradm">
                <p class="error-admin"><?php echo "Vous devez être connecté en tant qu'administrateur pour accéder a cette page"; ?></p>
            </div>
            <div class="div-lienerr">
                <a href="index.php" class="lien-error">Cliquez ici</a>
            </div>
            <div class="div-erradm2">  
                <p class="error-admin">pour revenir a la page d'accueil.</p>
            </div>
        </article>
    </section>
<?php endif;

if(isset($erreur)): ?>
    <div id=""><?php echo $erreur ?></div>
<?php endif;

ob_end_flush();

?>

    </body>
</html>