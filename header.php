
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="description" content="Voici la description de l'équipe des codeurs du dimanche">
    <link rel="stylesheet" href="css/boutique.css" type="text/css"/>
		<title>Boutique en ligne</title>
</head>
<body>
	<header>
		<section class="all-header">
		<img src="css/img-css/may.png" class="may"/>
		<article class="flex-end">
		<nav id="menu">
			<ul class="ul">
				<li class="li"> <a class="header-link" href="index.php">Accueil</a></li>
				<?php
				 	if (!isset($_SESSION['login']))
					{
				?>
						<li  class="li"><a class="header-link" href="inscription.php">Inscription</a></li>
						<li  class="li"><a class="header-link" href="connexion.php">Connexion</a></li>
				<?php
					}
					else
					{
						
				?>			
						<li  class="li"><a class="header-link" href="mon-profil.php">Profil</a></li>
  						<li  class="li"><a class="header-link" href="hommes.php">Hommes</a>
   							 <ul class="ul">
     							 <li  class="li"><a class="header-link" href="pantalon-homme.php">Pantalons</a></li>
     							 <li  class="li"><a class="header-link" href="haut-homme.php">Hauts</a></li>
     							 <li  class="li"><a class="header-link" href="short-homme.php">Shorts</a></li>
    						 </ul>
  						</li>
  						<li  class="li"><a class="header-link" href="femmes.php">Femmes</a>
   							 <ul class="ul">
     							 <li  class="li"><a class="header-link" href="pantalon-femme.php">Pantalons</a></li>
     							 <li  class="li"><a class="header-link" href="haut-femme.php">Hauts</a></li>
     							 <li  class="li"><a class="header-link" href="jupe-femme.php">Jupes</a></li>
     							 <li  class="li"><a class="header-link" href="robe-femme.php">Robes</a></li>
    						 </ul>
  						</li>
						<li  class="li"><a class="header-link" href="panier.php">Panier</a></li>
				<?php

						//On regarde si l'utilisateur connecté est modérateur ou administrateur
						$connect = mysqli_connect('localhost','root','','boutique');
						$query = "SELECT id_droits FROM utilisateurs WHERE login='".$_SESSION['login']."'";
						$reg = mysqli_query($connect,$query);
						$rows= mysqli_fetch_assoc($reg);
						
						if ($rows['id_droits'] == 10)
		
						{
							?><li  class="li"><a class="header-link" href="admin.php">Admin</a></li>
							  <li  class="li"><a class="header-link" href="creer-produit.php">Créer produit</a></li>
							<?php
						}

					?>
						<li  class="li"><a class="header-link" href="deconnexion.php">Déconnexion</a></li>
				<?php
						}
				
				?>
			</ul>
		</nav>
		</article>
	  </section>
	</header>
</body>
</html>