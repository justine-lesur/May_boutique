<?php

session_start();
ob_start();
////////// UTILISATEURS //////////

$connexion = mysqli_connect("localhost","root","","boutique");
$requete_user = "SELECT * FROM `utilisateurs` WHERE id_droits = 1";
$query_user = mysqli_query($connexion, $requete_user);
$resultat_user = mysqli_fetch_all($query_user);

////////// ARTICLES //////////

$requete = "SELECT * FROM articles ORDER BY nom ASC";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);

////////// VENTES //////////

$requete_achat = "SELECT id, nom FROM articles ORDER BY achats DESC LIMIT 5";
$query_achat = mysqli_query($connexion,$requete_achat);
$resultat_achat = mysqli_fetch_all($query_achat);

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

// if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): ?>

        <main>
            <section>

<!-- ////////// TABLEAU UTILISATEURS ////////// -->

                <table>
                    <thead>
                        <tr>
                            <th>Login</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
<?php 
                    foreach($resultat_user as $users):
?>
                        <tr>
                            <td><?php echo $users[1] ?></td>
                            <td><?php echo $users[2] ?></td>
                            <td><?php echo $users[3] ?></td>
                            <td><a href="delete.php?id=<?php echo $users[0] ?>"><img src="img/Button-Delete-icon.png" alt="delete" id="but-img-del"></a></td>
                        </tr>
<?php
                    endforeach;
?>
                    </tbody>
                </table>

<!-- ////////// TABLEAU PRODUITS ////////// -->

                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                    foreach($resultat as $key => $value):
?>           
                        <tr>
                            <td><?php echo $value[1] ?></td>
                            <td><?php echo $value[6]?> €</td>
                            <td><a href="edit-admin.php?idprod=<?php echo $value[0] ?>"><img src="img/modif.png" alt="modifier" id="but-img-edit"></a></td>
                            <td><a href="delete.php?id=<?php echo $value[0] ?>"><img src="img/Button-Delete-icon.png" alt="delete" id="but-img-del"></a></td>
                        </tr>
<?php
                    endforeach;
?>
                    </tbody>
                </table>

<!-- ////////// TABLEAU VENTES ////////// -->

                <table>
                    <thead>
                        <tr>
                            <h1>Les meilleures ventes</h1>
                        </tr>
                    </thead>
                    <tbody>
<?php
                    foreach($resultat_achat as $achat):
?>
                        <tr>
                            <td><?php echo $achat[1] ?></td>
                        </tr>
<?php
                    endforeach; 
?>
                    </tbody>
                </table>

<!-- ////////// ADD CAT ////////// -->
<?php
    if(isset($_POST["cat-add"])){
        $categorie = filter_input(INPUT_POST,"add-categorie");

        $req_add_cat = "INSERT INTO `categories`(`id`, `nom`) VALUES (null, '".$categorie."')";
        $que_add_cat = mysqli_query($connexion,$req_add_cat);
        $res_add_cat = mysqli_fetch_all($que_add_cat);
        header("location: admin.php");
    }
?>
                <form action="" method="post">
                    <label for="add-categorie">Ajouter une catégorie</label>
                    <input type="text" name="add-categorie">
                    <input type="submit" name="cat-add">
                </form>
<?php
    if(isset($_POST["typ-add"])){
        $types = filter_input(INPUT_POST,"add_types");

        $req_add_types = "INSERT INTO `types`(`id`, `nom`) VALUES (null, '".$types."')";
        $que_add_types = mysqli_query($connexion, $req_add_types);
        $res_add_types = mysqli_fetch_all($que_add_types);
        header("location:admin.php");
    }
?>
                <form action="" method="post">
                    <label for="add-types">Ajouter une sous catégorie</label>
                    <input type="text" name="add_types">
                    <input type="submit" name="typ-add">
                </form>
            </section>
        </main>
<?php
ob_end_flush();
// endif; ?>

    </body>
</html>