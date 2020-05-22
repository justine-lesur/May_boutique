<?php

session_start();

ob_start();

$connexion = mysqli_connect("localhost","root","","boutique");
$idproduit = $_GET["idprod"];
$requete = "SELECT id, nom, prix FROM articles WHERE id = '$idproduit'";
$query = mysqli_query($connexion,$requete);
$resultat = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<?php if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): ?>
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
                        <section id="sec-for-edit">
                            <form action="edit-admin.php?idprod=<?php echo $idproduit ?>" method="post" id="form-editadm">
                                <label for="nom" class="labnp">Modifier le nom</label>
                                <input type="text" name="nom" value="<?php echo $resultat[0]["nom"] ?>" class="inp-prod">
                                <label for="prix" class="labnp">Modifier le prix</label>
                                <input type="number" name="prix" step="0.01" min="0" value="<?php echo $resultat[0]["prix"] ?>" class="inp-prod">
                                <input type="submit" name="modifier" value="Modifier" id="inp-modif-prod">
                            </form>
                        </section>
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

if(isset($_POST["modifier"])){
    $name = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST,"prix",FILTER_VALIDATE_INT);
    if(strlen($name) > 3){
        if($price > 0 && $price < 999){
            $connexion = mysqli_connect("localhost","root","","boutique");
            $requete = "UPDATE articles SET nom ='".$name."', prix = $price WHERE id = '".$idproduit."'";
            $query = mysqli_query($connexion,$requete);
            header("Location:admin.php");
        } else {
            $erreur = "Le prix ne peut pas être inférieur ou égale a 0";
        }
    } else {
        $erreur = "Veuillez entrer un nom supérieur a 3 caractères";
    }
}

if(isset($erreur)): ?>
    <div id=""><?php echo $erreur ?></div>
<?php endif;

ob_end_flush(); ?>

                    </section>
            </section>
        </main>
    </body>
</html>