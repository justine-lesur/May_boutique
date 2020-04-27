<?php

session_start();

ob_start();

////////// ARTICLES //////////

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
        <link rel="stylesheet" href="css/boutique.css">
    </head>
    <body>
<?php

// if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): ?>

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
                                    <td  class="tdmin" id="tdmin2"><?php echo $value[6]?> €</td>
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
ob_end_flush();
// endif; ?>

    </body>
</html>

