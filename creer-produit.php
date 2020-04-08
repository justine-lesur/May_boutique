<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
    </head>
    <main>
        
<?php 

if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): 

?>

        <h1>Ajouter un article</h1>
        <form action="creer-produit.php" method="post">
            <label for="nom">Nom de l'article : </label>
            <input type="text" name="nom" required>

            <label for="id_categorie">Catégorie : </label>
            <input type="number" name="id_categorie" required>

            <label for="id_type">Type : </label>
            <input type="number" name="id_type" required>

            <label for="image">Lien image : </label>
            <input type="text" name="image" required>

            <label for="description">Description : </label>
            <textarea name="description" id="" cols="30" rows="10" required></textarea>

            <label for="prix">Prix : </label>
            <input type="number" name="prix" step="0.01" required>

            <label for="date">Date d'ajout : </label>
            <input type="date" name="date" required>

            <label for="ts">Taille S : </label>
            <input type="number" name="ts" required>

            <label for="tm">Taille M : </label>
            <input type="number" name="tm" required>

            <label for="tl">Taille L : </label>
            <input type="number" name="tl" required>

            <label for="achat">Quantité achetée : </label>
            <input type="number" name="achat" required>   

            <input type="submit" name="creer">
        </form>
<?php 

elseif(empty($_SESSION["login"]) || $_SESSION["id_droits"] == 1):

    $erreur = "Vous devez être connecté en tant qu'administrateur pour accéder a cette page";

endif;

?>
    </main>
</html>    

<?php

if(isset($_POST["creer"])):

    $name = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_SPECIAL_CHARS);
    $cat = filter_input(INPUT_POST,"id_categorie",FILTER_VALIDATE_INT);
    $type = filter_input(INPUT_POST,"id_type",FILTER_VALIDATE_INT);
    $img = filter_input(INPUT_POST,"image");
    $text = filter_input(INPUT_POST,"description",FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST,"prix",FILTER_VALIDATE_FLOAT);
    $date = filter_input(INPUT_POST,"date");
    $taille1 = filter_input(INPUT_POST,"ts",FILTER_VALIDATE_INT);
    $taille2 = filter_input(INPUT_POST,"tm",FILTER_VALIDATE_INT);
    $taille3 = filter_input(INPUT_POST,"tl",FILTER_VALIDATE_INT);
    $achat = filter_input(INPUT_POST,"achat",FILTER_VALIDATE_INT);

    if(!empty($name) && !empty($cat) && !empty($type) && !empty($img) && !empty($text) && !empty($price) && !empty($date) && !empty($taille1) && !empty($taille2) && !empty($taille3) && !empty($achat)):
        
        $connexion = mysqli_connect("localhost","root","","boutique");
        $requete = "INSERT INTO articles VALUES (null,'".$name."',$cat,$type,'".$img."','".$text."',$price,'".$date."',$taille1,$taille2,$taille3,$achat)";
        $query = mysqli_query($connexion,$requete);
        header("Location:creer-produit.php");

    else:

        $erreur = "tous les champs doivent être completés";

    endif;
endif;

if(isset($erreur)): ?>
    <div id=""><?php echo $erreur ?></div>
<?php endif;

?>
