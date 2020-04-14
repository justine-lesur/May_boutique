<?php

session_start();

ob_start();

$connexion = mysqli_connect("localhost","root","","boutique");
$requete ="SELECT DISTINCT c.*, a.id_categorie FROM categories c INNER JOIN articles a ON c.id = a.id_categorie";
$query = mysqli_query($connexion, $requete);
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

// if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): ?>

        <main>
            <section>
                <div>                
<?php foreach($resultat as $cate): ?>
    <div>
    <h3><?php echo $cate[1] ?></h3>
        <a href="delete-categorie.php?id=<?php echo $cate[0] ?>"><img src="img/Button-Delete-icon.png" alt="delete" id="but-cat-del"></a>
    </div>
<?php
    $catid = $cate[0];

    $requete2 = "SELECT DISTINCT a.id_type, t.nom FROM articles a INNER JOIN types t ON a.id_type = t.id WHERE id_categorie = '".$catid."'";
    $query2 = mysqli_query($connexion,$requete2);
    $resultat2 = mysqli_fetch_all($query2);
// var_dump($resultat2);

    foreach($resultat2 as $type): ?>
        <div>
            <h4><?php echo $type[1] ?></h4>
            <a href="delete-type.php?id=<?php echo $type[0] ?>"><img src="img/Button-Delete-icon.png" alt="delete" id="but-cat-del"></a>
        </div>
<?php
    endforeach;
endforeach;
?>
                </div>
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
                <div>
                    <h2>Catégories</h2>
<?php
                    foreach($res_cat as $cat): ?>
                        <p><?php echo $cat[1] ?></p>
                        <a href="delete-categorie.php?id=<?php echo $cat[0] ?>"><img src="img/Button-Delete-icon.png" alt="delete" id="but-cat-del"></a>
                    <?php endforeach; ?>
                
                </div>

<?php
    $req_type = "SELECT * FROM types";
    $que_type = mysqli_query($connexion,$req_type);
    $res_type = mysqli_fetch_all($que_type);
// var_dump($res_cat);
?>
                <div>
                    <h2>Types</h2>
<?php
                    foreach($res_type as $type): ?>
                        <p><?php echo $type[1] ?></p>
                        <a href="delete-type.php?id=<?php echo $type[0] ?>"><img src="img/Button-Delete-icon.png" alt="delete" id="but-cat-del"></a>
                    <?php endforeach; ?>
                
                </div>
<?php   

    if(isset($_POST["cat-add"])){
        $categorie = filter_input(INPUT_POST,"add-categorie");

        $req_add_cat = "INSERT INTO `categories`(`id`, `nom`) VALUES (null, '".$categorie."')";
        $que_add_cat = mysqli_query($connexion,$req_add_cat);
        $res_add_cat = mysqli_fetch_all($que_add_cat);
        header("Location: gestion-categorie.php");
    }
?>
                <div>
                    <div>
                        <form action="" method="post">
                            <label for="add-categorie">Ajouter une catégorie</label>
                            <input type="text" name="add-categorie">
                            <!-- <select name="types" id="">
                                <?php foreach($resultat as $type): ?>
                                    <option value="<?php echo $nb ?>"><?php echo $type[1] ?></option>
                                <?php
                                echo $nb++;
                                endforeach; ?>
                            </select> -->
                            <input type="submit" name="cat-add">
                        </form>
                    </div>

<!-- ////////// ADD CAT ////////// -->

<?php
    if(isset($_POST["typ-add"])){
        $types = filter_input(INPUT_POST,"add_types");

        $req_add_types = "INSERT INTO `types`(`id`, `nom`) VALUES (null, '".$types."')";
        $que_add_types = mysqli_query($connexion, $req_add_types);
        $res_add_types = mysqli_fetch_all($que_add_types);
        header("Location: gestion-categorie.php");
    }
?>
                    <div>
                        <form action="" method="post">
                            <label for="add-types">Ajouter un type</label>
                            <input type="text" name="add_types">
                            <input type="submit" name="typ-add">
                        </form>
                    </div>
                </div>
            </section>
        </main>
<?php
ob_end_flush();
// endif; ?>

    </body>
</html>