<?php
require "justine-class.php";
$var = new user;

?>


<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<title>May - Mon profil</title>
	</head>

	<body>
	<section class="image-background">
	<?php
	include('header.php');
	?>
	<h1 class="hashtag">#profil</h1>
	</section>
	<section class="formulaire">
		<form method="post">
			<section class="modif">
			<?php
				if(!isset($_SESSION['login']))
				{
					header('Location: index.php');
					
				} else
				{
				?>
			<h2 class="modifier">Modifier mon identifiant</h1>
			<label>
				<input type="text" name="login2" class="input" placeholder="Nouvel identifiant*" required/><br/>
			</label>
			<label>
				<input type="password" name="motdepasse" class="input" placeholder="Mot de passe*" required/><br/>
			</label>
			<label>
				<input type="submit" name="submit2" class="submit" value="Valider" />
			</label>
		</form>
		<?php $var->updatelogin();?>
		</section>
		</section>
		
	<section class="formulaire">	
		<form method="post">
			<section class="modif">
			<h1 class="modifier">Modifier mon mot de passe</h1>
			<label>
				<input type="password" name="ancienmotdepasse" class="input" placeholder="Ancien mot de passe*" required/><br/>
			</label>
			<label>
				<input type="password" name="nouveaumotdepasse" class="input" placeholder="Nouveau mot de passe*" required/><br/>
			</label>
			<label>
				<input type="submit" class="submit" name="submit3" value="Valider" />
			</label>
		</form>
		<?php $var->updatepassword();?>
		</section>
	</section>
		<section class="modif">
			<h2 class="modifier">Historique d'achats</h2>
			<a href="#" id="locat"></a>
			<table class="class-table">
				<tbody class="tbody">
					<tr class="haut">
						<th class="ligne-tableau">Commande</th>
						<th class="ligne-tableau">Adresse</th>
						<th class="ligne-tableau">Date d'achat</th>
						<th class="ligne-tableau">Prix total</th>
						<th class="ligne-tableau">Paiement</th>
					</tr>
					<?php
						$connexion = mysqli_connect('localhost','root','','boutique'); 
						$historique = "SELECT * FROM commandes WHERE id_utilisateur = ".$_SESSION['id']."";
						$queryhistorique = mysqli_query($connexion, $historique);
						$resultat = mysqli_fetch_all($queryhistorique);
										
					
						foreach($resultat as $articles)
					{
					?>
					<tr>
						<td class="ligne-td"><?php echo $articles[5]; ?></td>
						<td class="ligne-td"><?php echo $articles[4]; ?></td>
						<td class="ligne-td"><?php echo $articles[3]; ?></td>
						<td class="ligne-td"><?php echo $articles[2]; ?></td>
						<td class="ligne-td"><?php echo $articles[6]; ?></td>
					</tr>	
					<?php
					}
					?>
				</tbody>
			</table>
		</section>
		<?php
				}
			include('footer.php');
		?>
	</body>
</html>