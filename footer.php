<!doctype html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="description" content="">
    <link rel="stylesheet" href="css/boutique.css">
		<title>CV de Justine</title>
</head>

<footer>
	
			<ul>
				<li><a href="hommes.php">HOMMES</a></li>
     			<li><a href="pantalon-homme.php">Pantalons</a></li>
     			<li><a href="haut-homme.php">Hauts</a></li>
     			<li><a href="short-homme.php">Shorts</a></li>
   			</ul>
	
			<ul>
				<li><a href="femmes.php">FEMMES</a></li>
     			<li><a href="pantalon-femme.php">Pantalons</a></li>
     			<li><a href="haut-femme.php">Hauts</a></li>
     			<li><a href="jupe-femme.php">Jupes</a></li>
     			<li><a href="robe-femme.php">Robes</a></li>
    		</ul>
	
			<?php
				if (isset($_SESSION['login']))
				{
			?>
				<ul>
					<li><a href="femmes.php">PROFIL</a></li>
     				<li><a href="profil.php">Historique d'achats</a></li>
     				<li><a href="deconnexion.php">Se Déconnecter</a></li>
    			</ul>	
			<?php
				}
			?>
  </footer>
</html>