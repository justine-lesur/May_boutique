<?php

session_start();

ob_start();

////////// ARTICLES ///////////

$connexion = mysqli_connect("localhost","root","","boutique");
$requete = "SELECT * FROM articles ORDER BY nom ASC";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);



////////// CATEGORIES //////////

// "SELECT DISTINCT c.nom, t.nom FROM articles AS a INNER JOIN categories AS c ON a.id_categorie = c.id INNER JOIN types AS t ON a.id_type = t.id WHERE id_categorie"




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
                        <a href="admin.php" class="lien-nav lien-lonely"><li>Admin</li></a>
                        <a href="creer-produit.php" class="lien-nav lien-nav2 lien-lonely2"><li>Créer un produit</li></a>
                        <a href="edit-user-admin.php" class="lien-nav lien-nav2 lien-lonely3"><li>Gestion utilisateurs</li></a>
                        <a href="gestion-categorie.php" class="lien-nav lien-nav2 lien-lonely4"><li>Gestion catégories</li></a>
                        <a href="display-commandes.php" class="lien-nav lien-nav2 lien-lonely5"><li>Gestion commandes</li></a>
                        <a href="topsale-admin.php" class="lien-nav lien-nav2 lien-lonely6"><li>Top 5 ventes</li></a>
                    </ul>
                </nav>
                    <section class="sec-container2">

<!-- ////////// TABLEAU PRODUITS ////////// -->
                        <div class="box-title">
                            <h1 class="title-admin">Liste des produits</h1>
                        </div>
                        <table id="admin-table">
                            <thead>
                                <tr id="tr-admin">
                                    <th class="thmin" id="admin-nameth">Nom</th>
                                    <th class="thmin" id="admin-priceth">Prix</th>
                                    <th class="thmin admin-dedith">Modifier</th>
                                    <th class="thmin admin-dedith">Supprimer</th>
                                </tr>
                            </thead>
                            <div id="shadow-box"></div>
                            <tbody>

<?php foreach($resultat as $key => $value): ?>

                                <tr id="admin-prodtr">
                                    <td class="tdmin" id="tdmin1"><?php echo $value[1] ?></td>
                                    <td  class="tdmin" id="tdmin2"><?php echo number_format((float)$value[6],2,".","");?> €</td>
                                    <td  class="tdmin tdmin-model"><a href="edit-admin.php?idprod=<?php echo $value[0] ?>" class="admin-dedien"><img src="img/modif.png" alt="modifier" id="admin-edit-img"></a></td>
                                    <td  class="tdmin tdmin-model"><a href="delete-produit.php?id=<?php echo $value[0] ?>" class="admin-dedien"><img src="img/Button-Delete-icon.png" alt="delete" id="admin-del-img"></a></td>
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

ob_end_flush();

if(isset($erreur)): ?>
    <div id=""><?php echo $erreur ?></div>
<?php endif; ?>
    </body>
</html>

