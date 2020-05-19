<?php

session_start();

ob_start();

$connexion = mysqli_connect("localhost","root","","boutique");
$requete ="SELECT DISTINCT c.*, a.id_categorie FROM categories c INNER JOIN articles a ON c.id = a.id_categorie";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);



/*////////// AJOUT CATEGORIE //////////*/


if(isset($_POST["cat-add"])){
    $categorie = filter_input(INPUT_POST,"add-categorie");

    $req_add_cat = "INSERT INTO `categories`(`id`, `nom`) VALUES (null, '".$categorie."')";
    $que_add_cat = mysqli_query($connexion,$req_add_cat);
    $res_add_cat = mysqli_fetch_all($que_add_cat);
    header("Location: gestion-categorie.php");
}


/*////////// AJOUTE TYPE //////////*/


if(isset($_POST["typ-add"])){
    $types = filter_input(INPUT_POST,"add_types");

    $req_add_types = "INSERT INTO `types`(`id`, `nom`) VALUES (null, '".$types."')";
    $que_add_types = mysqli_query($connexion, $req_add_types);
    $res_add_types = mysqli_fetch_all($que_add_types);
    header("Location: gestion-categorie.php");
}





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
                        <a href="edit-user-admin.php" class="lien-nav lien-nav2 lien-lonel4"><li>Gestion utilisateurs</li></a>
                        <a href="gestion-categorie.php" class="lien-nav lien-lonely"><li>Gestion catégories</li></a>
                        <a href="display-commandes.php" class="lien-nav lien-nav2 lien-lonely5"><li>Gestion commandes</li></a>
                        <a href="topsale-admin.php" class="lien-nav lien-nav2 lien-lonely6"><li>Top 5 ventes</li></a>
                    </ul>
                </nav>
                <section id="sec-container2-modif">
                    <div class="box-title">
                        <h1 class="title-admin">Liste des catégories</h1>
                    </div>
                    <section id="sec-container3">
                        <article class="art-forcat" id="art-listing">
                            <div class="box-gescat">
                                <h2 class="gescat-title">Listing</h2>
                            </div>
<?php foreach($resultat as $cate): ?>
    
                            <div id="list-cont-cat">
                                <ul id="ul-of-cat"><?php echo $cate[1] ?></ul>
                                <a href="delete-categorie.php?id=<?php echo $cate[0] ?>" class="lien-gescat-del"><img src="img/Button-Delete-icon.png" alt="delete" class="but-gescat-del"></a>
                            </div>
<?php
    $catid = $cate[0];

    $requete2 = "SELECT DISTINCT a.id_type, t.nom FROM articles a INNER JOIN types t ON a.id_type = t.id WHERE id_categorie = '".$catid."'";
    $query2 = mysqli_query($connexion,$requete2);
    $resultat2 = mysqli_fetch_all($query2);
// var_dump($resultat2);

    foreach($resultat2 as $type): ?>
                            <div id="list-cont-typ">
                                <li id="li-ulofcat"><?php echo $type[1] ?></li>
                                <a href="delete-type.php?id=<?php echo $type[0] ?>" class="lien-gescat-del"><img src="img/Button-Delete-icon.png" alt="delete" class="but-gescat-del"></a>
                            </div>
<?php

    endforeach;
endforeach;

?>
                        </article>
<?php
//     $requete = "SELECT DISTINCT a.id_type, t.nom FROM articles a INNER JOIN types t ON a.id_type = t.id ORDER BY id_type";
//     $query = mysqli_query($connexion,$requete);
//     $resultat = mysqli_fetch_all($query);
// var_dump($resultat);
//     $nb = 0;

    $req_cat = "SELECT * FROM categories";
    $que_cat = mysqli_query($connexion,$req_cat);
    $res_cat = mysqli_fetch_all($que_cat);
// var_dump($res_cat);
?>
                        <article class="art-forcat">
                            <div class="box-gescat">
                                <h2 class="gescat-title">Catégories</h2>
                            </div>
<?php foreach($res_cat as $cat): ?>
                            <div id="box-gestcat">
                                <p class="para-gescat"><?php echo $cat[1] ?></p>
                                <a href="delete-categorie.php?id=<?php echo $cat[0] ?>" class="lien-gescat-del lien-gescat-del2"><img src="img/Button-Delete-icon.png" alt="delete" class="but-gescat-del2"></a>
                            </div>
<?php endforeach; ?>
                            <div>
                                <form action="" method="post" class="formulaire-gescat">
                                    <label for="add-categorie">Ajouter une catégorie</label>
                                    <input type="text" name="add-categorie" class="add-cathy">
                                    <!-- <select name="types" id="">
                                        <?php foreach($resultat as $type): ?>
                                            <option value="<?php echo $nb ?>"><?php echo $type[1] ?></option>
                                        <?php
                                        echo $nb++;
                                        endforeach; ?>
                                    </select> -->
                                    <input type="submit" name="cat-add" id="cat-add" value="Ajouter">
                                </form>
                            </div>                    
                        </article>

<?php
    $req_type = "SELECT * FROM types";
    $que_type = mysqli_query($connexion,$req_type);
    $res_type = mysqli_fetch_all($que_type);
// var_dump($res_cat);
?>
                        <article class="art-forcat">
                            <div class="box-gescat">
                                <h2 class="gescat-title">Types</h2>
                            </div>
<?php foreach($res_type as $type): ?>
                            <div id="box-gesttyp">
                                <p class="para-gescat"><?php echo $type[1] ?></p>
                                <a href="delete-type.php?id=<?php echo $type[0] ?>" class="lien-gescat-del lien-gescat-del2"><img src="img/Button-Delete-icon.png" alt="delete" class="but-gescat-del2"></a>
                            </div>
<?php endforeach; ?>
                            <div>
                                <form action="" method="post" class="formulaire-gescat">
                                    <label for="add-types">Ajouter un type</label>
                                    <input type="text" name="add_types" class="add-cathy">
                                    <input type="submit" name="typ-add" id="typ-add" value="Ajouter">
                                </form>
                            </div>
                        </article>
                    </section>
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