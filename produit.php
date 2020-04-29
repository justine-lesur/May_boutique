<?php
require "justine-class.php";

ob_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>May - Boutique</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>
	<section class="grey">
	<section class="image-background2">
		<?php
			include('header.php');
		?>
		<h1 class="hashtag2">#boutique</h1>
	</section>
	<section class="all-produits">
		<?php
			$var = new produits;
			$var->pageproduit();
		?>
	</section>
	<section class="commentaires">
		<h3 class="titre-produit">Commentaires</h3>
		<article>
		<?php
				$connexion = mysqli_connect("localhost", "root", "", "boutique");
				$requete = "SELECT * FROM commentaires WHERE id_article = '".$_GET['id']."'";
				$resultat = mysqli_query($connexion, $requete);
				$donnees = mysqli_fetch_all($resultat);		
				
				foreach($donnees as $articles)
				{
		?>
					<article class="mon-commentaire">
						<h4 class="taille-quantite"><span class="note-cinq"><?php echo $articles[4]; ?>/5</span> Posté par <?php echo $articles[1]; ?></div></h4>
						<p class="description3"><?php echo $articles[2]; ?></p>
					</article>
		<?php
				}
		?>
				<form method="post" action="" class="valider-paiement">
					<h3 class="titre-produit">Insérer un commentaire</h3>
					<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
					<textarea name="description" id="description" class="description2" placeholder="Votre commentaire*" required/></textarea>
					<label><h4 class="taille-quantite">Note sur 5</h4></label>
					<select name="note" id="quantite" class="selection" required>
						<option value="1">1</option>
					 	<option value="2">2</option>
						<option value="3">3</option>  
						<option value="4">4</option>
				   		<option value="5">5</option>  
					</select>
					<input type="submit" name="submit3" class="submit3"/>  
				</form>
		</article>
		
			<?php
				if(isset($_POST['submit3']))
				{
					$commentaire = $_POST['description'];
					$commentaire2 = addslashes($commentaire);
					$id_article = $_POST['id'];
					$note = $_POST['note'];
				
					if ($commentaire2) 
					{
						$connexion = mysqli_connect("localhost", "root", "", "boutique"); 
						$requete4 = "INSERT INTO commentaires (login, commentaire, id_article, note) VALUES ('".$_SESSION['login']."','$commentaire2','$id_article','$note')";
						$req4 = mysqli_query($connexion, $requete4);
						header('Location: '.$_SERVER['HTTP_REFERER']);
					}
					
					else 
					{
						echo "<div class='mdp2'><p class='voir-articles5'>Veuillez insérer un commentaire</p></div>";		
					}
				}
			?>
	</section>
			<?php
			ob_end_flush();
				include('footer.php');
			?>
	</section>
</body>
</html>