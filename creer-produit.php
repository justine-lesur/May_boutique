<?php

session_start();



////////// UTILISATEURS //////////

// $connexion = mysqli_connect("localhost","root","","boutique");
// $username = $_SESSION['login'];
// $requete = "SELECT * FROM `utilisateurs` WHERE login = '$username'";
// $query = mysqli_query($connexion,$requete);
// $resultat = mysqli_fetch_all($query);

/////////// 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
    </head>
    <main>
        
<?php 

// if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): 

?>

        <h1>Ajouter un article</h1>
        <form action="creer-produit.php" method="post" enctype="multipart/form-data">
            <label for="nom">Nom de l'article : </label>
            <input type="text" name="nom" required>

            <label for="id_categorie">Catégorie : </label>
            <input type="number" name="id_categorie" required>

            <label for="id_type">Type : </label>
            <input type="number" name="id_type" required>

            <label for="image">Lien image : </label>
            <input type="file" name="image" required>

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

            <input type="text" name="achat">

            <input type="submit" name="creer">
        </form>
<?php 

// elseif(empty($_SESSION["login"]) || $_SESSION["id_droits"] == 1):

    // $erreur = "Vous devez être connecté en tant qu'administrateur pour accéder a cette page";

// endif;

?>
    </main>
</html>    

<?php
if(isset($_POST["creer"])):
    if(isset($_FILES['image']) && !empty($_FILES['image'])){
        $tailleMax = 2097152 ;
        $extensionsValides = $arrayName = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['image']['size'] <= $tailleMax) 
        {
            $extensionsUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
            if(in_array($extensionsUpload, $extensionsValides)) 
            {
                $chemin = "img/".$_POST['nom'].".".$extensionsUpload;
                            
                $deplacement = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
                if($deplacement) 
                {
                    $img = "img/".$_POST['nom'].".".$extensionsUpload;
                }
                else
                {
                    $erreur = "Erreur durant l'importation de votre photo de profil" ;
                }
            }
            else
            {
                $erreur = "Votre photo de profil doit être au format jpg, jpeg, gif ou png. ";
            }

        }
        else
        {
            $erreur = "Votre photo de profil ne doit pas dépasser 2Mo" ;
        }
    }

    $name = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_SPECIAL_CHARS);
    $cat = filter_input(INPUT_POST,"id_categorie",FILTER_VALIDATE_INT);
    $type = filter_input(INPUT_POST,"id_type",FILTER_VALIDATE_INT);
    $text = filter_input(INPUT_POST,"description",FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST,"prix",FILTER_VALIDATE_FLOAT);
    $date = filter_input(INPUT_POST,"date");
    $taille1 = filter_input(INPUT_POST,"ts",FILTER_VALIDATE_INT);
    $taille2 = filter_input(INPUT_POST,"tm",FILTER_VALIDATE_INT);
    $taille3 = filter_input(INPUT_POST,"tl",FILTER_VALIDATE_INT);
    $achat = filter_input(INPUT_POST,"achat",FILTER_VALIDATE_INT);

    if(!empty($name) && !empty($cat) && !empty($type) && !empty($img) && !empty($text) && !empty($price) && !empty($date) && !empty($taille1) && !empty($taille2) && !empty($taille3)):

        $connexion = mysqli_connect("localhost","root","","boutique");
        $requete = "INSERT INTO articles VALUES (null,'".$name."',$cat,$type,'".$img."','".$text."',$price,'".$date."',$taille1,$taille2,$taille3,$achat)";
        echo $requete;
        $query = mysqli_query($connexion,$requete);

    else:

        $erreur = "tous les champs doivent être completés";

    endif;
endif;

if(isset($erreur)): ?>
    <div id=""><?php echo $erreur ?></div>
<?php endif;

?>
