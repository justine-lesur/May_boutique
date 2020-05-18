<?php
session_start();
ob_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">    
<title>May - Panier</title>
</head>

<body>
  	<section class="grey">
		<section class="image-background2">
			<?php
			include('header.php');
			?>
			<h1 class="hashtag2">#panier</h1>
		</section>
		<section class="all-produits2">
			<?php
			if(!isset($_SESSION['login']))
			{
				header('Location: index.php');
				
			} else
			{
				$connexion = mysqli_connect('localhost','root','','boutique');

				if (isset($_POST['submit']))
				{
					$nouvelarticle = "SELECT *  FROM panier WHERE id_article='" .$_POST["id"]. "' AND taille = '".$_POST["taille"]."'";
					$reg = mysqli_query($connexion, $nouvelarticle);
					$data = mysqli_fetch_assoc($reg);
					$rows = mysqli_num_rows($reg);
					
								if(empty($rows))
								{
									$requete = "INSERT INTO panier (id_utilisateur, id_article, quantite, taille) VALUES (".$_SESSION['id'].",".$_POST["id"].",".$_POST["quantite"].",'".$_POST["taille"]."')";
									$query = mysqli_query($connexion, $requete);

								} else {
									$requetelimite2 = "SELECT ".$_POST["taille"]." FROM articles WHERE id = '".$_POST["id"]."'";
									$queryjesaispluscombien2 = mysqli_query($connexion, $requetelimite2);
									$resultatdoe = mysqli_fetch_all($queryjesaispluscombien2);

									$quantite = $_POST['quantite'] + $data['quantite'];

									if($quantite <= $resultatdoe[0][0])
									{
										$updatearticle = "UPDATE panier SET quantite = '".$quantite."' WHERE id_article='" .$_POST["id"]. "'";
										$reg2 = mysqli_query($connexion, $updatearticle);
										header('Location:panier.php');
									} 

									else
									{
										echo "<p class='message-erreur'>stock indisponible</p>";
									}
								}
				}

					$requete2 = "SELECT * FROM panier WHERE id_utilisateur = ".$_SESSION['id']."";
					$query2 = mysqli_query($connexion, $requete2);
					$resultat2 = mysqli_fetch_all($query2);

					$prix = 0;

					foreach ($resultat2 as $articles)
					{

						$requete3 = "SELECT * FROM articles WHERE id= $articles[2]";	
						$query3 = mysqli_query($connexion, $requete3);
						$resultat3 = mysqli_fetch_all($query3);


						foreach($resultat3 as $articles2)

						{
							$prix += (floatval($articles2[6]) * intval($articles[3]));
							
							
			?>			
					<article class="one-produit">
						<article class="one-article">
							<div>
								<img src="<?php echo $articles2[4]?>" alt="mode" class='articles-produit'></a>
							</div>
							<div class="all-description">
								<h3 class="titre-produit"><?php echo $articles2[1] ?></h3>
								<p class="description"><?php echo $articles2[5] ?></p>
								<h3 class="prix"><?php echo $articles2[6] ?> €</h3>
								<h4>Quantité</h4>
								 <?php
									$requetelimite = "SELECT ".$articles[4]." FROM articles WHERE id = '".$articles[2]."'";
									$queryjesaispluscombien = mysqli_query($connexion, $requetelimite);
									$resultat4 = mysqli_fetch_all($queryjesaispluscombien);
								?>
								<form method="post">
									<input type="hidden" name="id" value="<?php echo $articles[0] ?>"/>
									<input type="hidden" name="quantiteinitiale" value="<?php echo $articles[3] ?>"/>
									<input type="hidden" name="stock" value="<?php echo $resultat4[0][0] ?>"/>
									<div class="gerer-quantite">
										<input type="submit" class="quantite-submit" name="moins" value="-"/>
										<p class="chiffre"><?php echo $articles[3] ?></p>
										<input type="submit" name="plus" class="quantite-submit" value="+"/>
									</div>
								</form>
								<div class="gerer-quantite">
									<h4>Taille <?php echo $articles[4] ?> </h4>
								</div>
								<form method="post">
									<input type="hidden" name="panier" value="<?php echo $articles[0] ?>"/>
									<input type="submit" name="submit2" value="supprimer l'article" class="submit2"/>  
								</form>
							</div>
						</article>
						</article>
			<?php
						}

					}


					?><h3 class="titre-produit">Prix total - <?php echo $prix, ' €';?></h3><?php

						if(isset($_POST['moins']))
						{
							if($_POST['quantiteinitiale'] > 0)
							{
								$quantite2 = $_POST['quantiteinitiale'] - 1;
								$updatequantite = "UPDATE panier SET quantite = '".$quantite2."' WHERE id = '" .$_POST["id"]. "'";
								$reg2 = mysqli_query($connexion, $updatequantite);
								header('location: panier.php');
							}	
							else 
							{
								echo "<p class='message-erreur'>Vous devez valider au moins un produit</p>";	
							}
						}	

						if(isset($_POST['plus']))
						{
							$quantite3 = $_POST['quantiteinitiale'] + 1;
							if($quantite3 <= $resultat4[0][0])
							{
								$updatequantite2 = "UPDATE panier SET quantite = '".$quantite3."' WHERE id = '" .$_POST["id"]. "'";
								$reg3 = mysqli_query($connexion, $updatequantite2);	
								header('location: panier.php');

							} 

							else 
							{ 
								echo "<p class='message-erreur'>stock indisponible</p>";
							}

						}


						if(isset($_POST['submit2']))
						{
							$query = "DELETE FROM panier WHERE id = '".$_POST['panier']."'";
							$reg = mysqli_query ($connexion, $query);
							header('Location: '.$_SERVER['HTTP_REFERER']);
						}

			?>

								<form method="post" class="valider-paiement">
									<textarea name="description" id="description" class="description2" placeholder="Adresse de livraison*" required></textarea>
									<article class="moyen-paiement">
										<div class="moyen"><input type="radio" name="moyen" value="mastercard" class="radio" required/> <img src="css/img-css/icons-01.png" class="icon"/></div>
										<div class="moyen"><input type="radio" name="moyen" value="cb" class="radio" required/> <img src="css/img-css/icons-02.png" class="icon"/></div>
										<div class="moyen"><input type="radio" name="moyen" value="visa" class="radio" required/> <img src="css/img-css/icons-03.png" class="icon"/></div>		
										<div class="moyen"><input type="radio" name="moyen" value="paypal" class="radio" required/> <img src="css/img-css/icons-06.png" class="icon"/></div>
									</article>
									<article class="valider-panier">
										<input type="submit" name="submit3" class="submit2" value="Valider le panier"/>
									</article>
								</form>
							

			<?php
				if(isset($_POST['submit3']) && $prix!=0)
				{
					date_default_timezone_set('UTC');
					$numero_commande = $_SESSION['id'].date("dNHis");

					$insertcommande2 = "INSERT INTO commandes (id_utilisateur, prix, date, adresse, numero_commande, moyen_paiement) VALUES (".$_SESSION['id'].", ".$prix.", NOW(),'".$_POST['description']."',".$numero_commande.",'".$_POST['moyen']."' )";
					$query7= mysqli_query($connexion, $insertcommande2);

					$selectionpanier = "SELECT * FROM panier WHERE id_utilisateur = ".$_SESSION['id']."";
					$query4 = mysqli_query($connexion, $selectionpanier);
					$resultat4 = mysqli_fetch_all($query4);

					foreach($resultat4 as $articles3)
					{

						$selectionarticles = "SELECT * FROM articles WHERE id = $articles3[2]";	
						$query5 = mysqli_query($connexion, $selectionarticles);
						$resultat5 = mysqli_fetch_all($query5);

						foreach($resultat5 as $articles4)
						{	
							$insertcommande = "INSERT INTO commande_produit (numero_commande, nom, prix, quantite, id_articles) VALUES (".$numero_commande.",'".$articles4[1]."', ".$articles4[6].",".$articles3[3].",".$articles3[2].")";
							$query6 = mysqli_query($connexion, $insertcommande);



							if($articles3[4] == 'S')
							{
								$quantitetaille = $articles4[8] - $articles3[3];
								$quantiteachats = $articles3[3] + $articles4[11];
								$updatearticle2 = "UPDATE articles SET S= '".$quantitetaille."', achats = '".$quantiteachats."' WHERE id= $articles3[2]";
								$query7 = mysqli_query($connexion, $updatearticle2);
							}

							elseif($articles3[4] == 'M')
							{
								$quantitetaille2 = $articles4[9] - $articles3[3];
								$quantiteachats2 = $articles3[3] + $articles4[11];
								$updatearticle3 = "UPDATE articles SET M= '".$quantitetaille2."', achats = '".$quantiteachats2."' WHERE id= $articles3[2]";
								$query8 = mysqli_query($connexion, $updatearticle3);
							}

							elseif($articles3[4] == 'L')
							{
								$quantitetaille3 = $articles4[10] - $articles3[3];
								$quantiteachats3 = $articles3[3] + $articles4[11];
								$updatearticle4 = "UPDATE articles SET M= '".$quantitetaille3."', achats = '".$quantiteachats3."' WHERE id= $articles3[2]";
								$query9 = mysqli_query($connexion, $updatearticle4);
							}

						}

					}

					$supprimerpanier = "DELETE FROM panier WHERE id_utilisateur = ".$_SESSION['id']."";
					$querysuppr = mysqli_query($connexion, $supprimerpanier);
				?>
				<meta http-equiv="refresh" content="0;URL=index.php">
		<?php
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