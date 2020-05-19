<?php

session_start();

ob_start();


$connexion= mysqli_connect("localhost","root","","boutique");
$requete = "SELECT u.login, c.numero_commande, c.adresse, c.date, c.prix, c.moyen_paiement, c.id FROM commandes c INNER JOIN commande_produit cp ON c.numero_commande = cp.numero_commande INNER JOIN utilisateurs u ON c.id_utilisateur = u.id";
$query = mysqli_query($connexion,$requete);
$resultat = mysqli_fetch_all($query);

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
                        <a href="display-commandes.php" class="lien-nav lien-lonely"><li>Gestion commandes</li></a>
                        <a href="topsale-admin.php" class="lien-nav lien-nav2 lien-lonely6"><li>Top 5 ventes</li></a>
                    </ul>
                </nav>
                <section class="sec-container2">
                    <div class="box-title">
                        <h1 class="title-admin">Liste des commandes</h1>
                    </div>
                    <div id="shadow-box2"></div>
                    <table id="tab-disp-com">
                        <thead>
                            <tr id="tr-th-disp">
                                <th class="thdisp" id="th-disp1">Pseudo</th>
                                <th class="thdisp" id="th-disp2">N° commande</th>
                                <th class="thdisp" id="th-disp3">Adresse</th>
                                <th class="thdisp" id="th-disp4">Date d'achat</th>
                                <th class="thdisp" id="th-disp5">Prix total</th>
                                <th class="thdisp" id="th-disp6">Paiement</th>
                            </tr>
                        </thead>
                        <tbody>
<?php   foreach($resultat as $commande): 

$newDate = date("d-m-Y H:i",strtotime($commande[3]))

?>
                            <tr>
                                <td class="tddisp" id="td-disp1"><?php echo $commande[0] ?></td>
                                <td class="tddisp" id="td-disp2"><?php echo $commande[1] ?></td>
                                <td class="tddisp" id="td-disp3"><?php echo $commande[2] ?></td>
                                <td class="tddisp" id="td-disp4"><?php echo $newDate ?></td>
                                <td class="tddisp" id="td-disp5"><?php echo $commande[4] ?> €</td>
                                <td class="tddisp" id="td-disp6"><?php echo $commande[5] ?></td>
                            </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </section>
        </main>
<?php

elseif(empty($_SESSION["login"]) || $_SESSION["id_droits"] == 1):

    $erreur = "Vous devez être connecté en tant qu'administrateur pour accéder a cette page";

endif; 

ob_end_flush();

?>

    </body>
</html>