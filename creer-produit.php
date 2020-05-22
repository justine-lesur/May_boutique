<?php

session_start();

date_default_timezone_set("Europe/Brussels"); //définit le décalage horaire à appliquer par défaut de toutes les fonctions de date et heure en PHP

$connexion = mysqli_connect("localhost","root","","boutique");
$requete = "SELECT * FROM categories";
$query = mysqli_query($connexion,$requete);
$resultat1 = mysqli_fetch_all($query);


$connexion = mysqli_connect("localhost","root","","boutique");
$requete = "SELECT * FROM types";
$query = mysqli_query($connexion,$requete);
$resultat2 = mysqli_fetch_all($query);


/* ///// REQUETE CONDITIONS CATS & TYPES ///// */

$connexion = mysqli_connect("localhost","root","","boutique");
$req_rowcat = "SELECT count(id) FROM categories";
$que_rowcat = mysqli_query($connexion,$req_rowcat);
$row_cat = mysqli_fetch_all($que_rowcat);

$connexion = mysqli_connect("localhost","root","","boutique");
$req_rowtype = "SELECT count(id) FROM types";
$que_rowtype = mysqli_query($connexion,$req_rowtype);
$row_type = mysqli_fetch_all($que_rowtype);

/////////// 

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
                        <a href="creer-produit.php" class="lien-nav lien-lonely"><li>Créer un produit</li></a>
                        <a href="edit-user-admin.php" class="lien-nav lien-nav2 lien-lonely3"><li>Gestion utilisateurs</li></a>
                        <a href="gestion-categorie.php" class="lien-nav lien-nav2 lien-lonely4"><li>Gestion catégories</li></a>
                        <a href="display-commandes.php" class="lien-nav lien-nav2 lien-lonely5"><li>Gestion commandes</li></a>
                        <a href="topsale-admin.php" class="lien-nav lien-nav2 lien-lonely6"><li>Top 5 ventes</li></a>
                    </ul>
                </nav>
                <section class="sec-container2">
                    <div class="box-title">
                        <h1 class="title-admin">Ajouter un produit</h1>
                    </div>
                    <section id="sec-incont2">
                        <div class="div-catyp">
                            <div class="shadow-boxcatyp"></div>
                            <table id="tab-creacat">
                                <caption class="cap-creaprd">Catégories</caption>
                                <thead>
                                    <tr>
                                        <th class="th-tab-creaprod">ID</th>
                                        <th class="th-tab-creaprod">NOM</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody-crea">
                                <?php foreach($resultat1 as $cat): ?>
                                    <tr class="tr-tab-creatyp">
                                        <td class="td-tabcrea-1"><?php echo $cat[0] ?></td>
                                        <td class="td-tabcrea-2"><?php echo $cat[1] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <form action="creer-produit.php" method="post" enctype="multipart/form-data" id="tab-creprod">
                            <div id="box-creame">
                                <label for="nom" class="inpcenter" id="lab-creame">Nom de l'article</label>
                                <input type="text" name="nom" id="inp-creame" required>
                            </div>

                            <div class="box-catypri">
                                <label for="id_categorie" class="inpcenter lab-crea">Catégorie</label>
                                <input type="number" name="id_categorie" class="inp-creacaty" min="1"  required>
                            </div>

                            <div class="box-catypri">
                                <label for="id_type" class="inpcenter lab-crea">Type</label>
                                <input type="number" name="id_type" class="inp-creacaty" min="1" required>
                            </div>

                            <div id="box-img">
                                <label for="image" id="lab-crimg">Image</label>
                                <input type="file" name="image" id="inp-img" required>
                            </div>

                            <div id="box-desc">
                                <label for="description" class="inpcenter lab-crea">Description </label>
                                <textarea name="description" cols="30" rows="10" id="crea-area" required></textarea>
                            </div>

                            <div class="box-catypri">
                                <label for="prix" class="inpcenter lab-crea">Prix</label>
                                <input type="number" name="prix" id="inprice" placeholder="0 €" step="0.01" min="0" max="999" required>
                            </div>

                            <div id="box-date">
                                <label for="date" id="labdate">Date d'ajout : </label>
                                <input type="date" name="date" id="inp-credat" id="date-size" required>
                            </div>
                            <div id="box-sizeinp">
                                <div>
                                    <h4 id="title-boxlabinp">Tailles</h4>
                                </div>
                                <div id="box-labinp">
                                    <div>
                                        <label for="ts" class="inpcenter">S</label>
                                        <input type="number" name="ts" class="inpsize" placeholder="0" min="0" required>
                                    </div>

                                    <div>
                                        <label for="tm" class="inpcenter">M</label>
                                        <input type="number" name="tm" class="inpsize" placeholder="0" min="0" required>
                                    </div>

                                    <div>
                                        <label for="tl" class="inpcenter">L</label>
                                        <input type="number" name="tl" class="inpsize" placeholder="0" min="0" required>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" name="creer" id="inp-create-prod" value="Ajouter">
                        </form>
                        <div class="div-catyp">
                            <div class="shadow-boxcatyp"></div>
                            <table id="tab-creaprod">
                                <caption class="cap-creaprd">Types</caption>
                                <thead>
                                    <tr>
                                        <th class="th-tab-creaprod">ID</th>
                                        <th class="th-tab-creaprod">NOM</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody-crea">
                                <?php foreach($resultat2 as $type): ?>
                                    <tr class="tr-tab-creatyp">
                                        <td class="td-tabcrea-1"><?php echo $type[0] ?></td>
                                        <td class="td-tabcrea-2"><?php echo $type[1] ?></td>   
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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

?> 
                </section>
            </section>
        </main>
    </body>
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
    $current_date = date("Y-m-d H:i:s");
    


    if(!empty($name) && !empty($cat) && !empty($type) && !empty($img) && !empty($text) && !empty($price) && !empty($date) && !empty($taille1) && !empty($taille2) && !empty($taille3)):
        if(strlen($name) > 3){
            if($cat > 0 && $type > 0 && $cat <= $row_cat && $type <= $row_type){
                if($price > 0){
                    if($date > $current_date){
                        if($taille1 >= 0 && $taille2 >= 0 && $taille3 >= 0){
                            $connexion = mysqli_connect("localhost","root","","boutique");
                            $requete = "INSERT INTO articles VALUES (null,'".$name."',$cat,$type,'".$img."','".$text."',$price,'".$date."',$taille1,$taille2,$taille3,0)";
                            // echo $requete;
                            $query = mysqli_query($connexion,$requete);
                        } else {
                            $erreur = "La quantité doit être supérieur ou égale a 0";
                        }
                    } else {
                        $erreur = "Vous ne pouvez pas entrer une date antérieur";
                    }
                } else {
                    $erreur = "Le prix doit être supérieur a 0";
                }
            } else {
                $erreur = "Choisissez une catégorie ou un type existant";
            }
        } else {
            $erreur = "Le nom doit être supérieur a 3 caractères";
        }

    else:

        $erreur = "tous les champs doivent être completés";

    endif;
endif;

if(isset($erreur)): ?>
    <div id=""><?php echo $erreur ?></div>
<?php endif;

?>
