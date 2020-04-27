<!doctype html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="description" content="">
    <link rel="stylesheet" href="css/boutique.css">
		<title>CV de Justine</title>
</head>

<footer>
			<img src="css/img-css/may.png" class="may"/>
			<ul class="ul">
				<li  class="li"><a href="hommes.php" class="footer-link">HOMMES</a></li>
     			<li  class="li"><a href="pantalon-homme.php" class="footer-link">Pantalons</a></li>
     			<li  class="li"><a href="haut-homme.php" class="footer-link">Hauts</a></li>
     			<li  class="li"><a href="short-homme.php" class="footer-link">Shorts</a></li>
   			</ul>
	
			<ul>
				<li  class="li"><a href="femmes.php" class="footer-link">FEMMES</a></li>
     			<li  class="li"><a href="pantalon-femme.php" class="footer-link">Pantalons</a></li>
     			<li  class="li"><a href="haut-femme.php" class="footer-link">Hauts</a></li>
     			<li  class="li"><a href="jupe-femme.php" class="footer-link">Jupes</a></li>
     			<li  class="li"><a href="robe-femme.php" class="footer-link">Robes</a></li>
    		</ul>
	
			<?php
				if (isset($_SESSION['login']))
				{
			?>
				<ul class="ul">
					<li  class="li"><a href="femmes.php" class="footer-link">PROFIL</a></li>
     				<li  class="li"><a href="profil.php" class="footer-link">Historique d'achats</a></li>
     				<li  class="li"><a href="deconnexion.php" class="footer-link">Se Déconnecter</a></li>
    			</ul>	
			<?php
				}
			?>
  </footer>
</html>