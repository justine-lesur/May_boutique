<?php

session_start();

ob_start();

$connexion = mysqli_connect("localhost","root","","boutique");
$idproduit = $_GET["idprod"];
$requete = "SELECT id, nom, prix FROM articles WHERE id = '$idproduit'";
$query = mysqli_query($connexion,$requete);
$resultat = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!-- // if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10):  -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <main>
            <form action="edit-admin.php?idprod=<?php echo $idproduit ?>" method="post">
                <input type="text" name="nom" value="<?php echo $resultat[0]["nom"] ?>">
                <input type="number" name="prix" step="0.01" value="<?php echo $resultat[0]["prix"] ?>">
                <input type="submit" name="modifier">
            </form>
<?php

if(isset($_POST["modifier"])){
    $name = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST,"prix",FILTER_VALIDATE_INT);
    $connexion = mysqli_connect("localhost","root","","boutique");
    $requete = "UPDATE articles SET nom ='".$name."', prix = $price WHERE id = '".$idproduit."'";
    $query = mysqli_query($connexion,$requete);
    header("Location:admin.php");
}

ob_end_flush();
// endif; ?>
        </main>
    </body>
</html>