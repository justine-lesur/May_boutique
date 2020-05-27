<?php

$connexion = mysqli_connect("localhost","root","","boutique");

$requete_cat = "SELECT * FROM categories";
$query_cat = mysqli_query($connexion,$requete_cat);
$res_cat = mysqli_fetch_all($query_cat);
// var_dump($res_cat);
    
if(isset($_GET["cat"]) && isset($_GET["type"])){
    $idcat = $_GET["cat"];
    $idtype = $_GET["type"];
    $requete = "SELECT * FROM articles WHERE id_categorie = '$idcat' AND id_type = '$idtype'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    // var_dump($resultat);
} elseif(isset($_GET["cat"])){
    $idcat = $_GET["cat"];
    $idtype = "0";
    $requete = "SELECT * FROM articles WHERE id_categorie = '$idcat'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    // var_dump($resultat);
} else {
    $erreur = "erreur";
}

?>
	
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
							<?php foreach($res_cat as $categories):
					
								// var_dump($categories);
								$idcat = $categories[0];
								$namecat = $categories[1]; ?>
								<li class="li">
									<a href="produits.php?cat=<?php echo $idcat ?>" class="header-link"><?php echo ucfirst($namecat) ?></a>
								<?php $requete_typ = "SELECT DISTINCT a.id_type, t.nom FROM articles a INNER JOIN types t ON a.id_type = t.id WHERE id_categorie = '".$idcat."'";
								$query_typ = mysqli_query($connexion,$requete_typ);
								$res_typ = mysqli_fetch_all($query_typ);
								// var_dump($res_typ);
								?>
									<ul class="ul">
									<?php foreach($res_typ as $types):
										$idtype = $types[0];
										$nametype = $types[1]; ?>
										<li class="li"><a href="produits.php?cat=<?php echo $idcat ?>&type=<?php echo $idtype ?>" class="header-link"><?php echo ucwords($nametype) ?></a></li>
									<?php endforeach; ?> 
									</ul>
								</li>		  
							<?php endforeach; ?>
								<li class="li"><a class="header-link" href="inscription.php">Inscription</a></li>
								<li class="li"><a class="header-link" href="connexion.php">Connexion</a></li>
						
						<?php
							}
							else
							{
								
						?>			
								<li class="li"><a class="header-link" href="mon-profil.php">Profil</a></li>

								<li class="li"><a class="header-link" href="panier.php">Panier</a></li>
						<?php

								//On regarde si l'utilisateur connecté est modérateur ou administrateur
								$connect = mysqli_connect('localhost','root','','boutique');
								$query = "SELECT id_droits FROM utilisateurs WHERE login='".$_SESSION['login']."'";
								$reg = mysqli_query($connect,$query);
								$rows= mysqli_fetch_assoc($reg);
								
								if ($rows['id_droits'] == 10)
				
								{
									?><li class="li"><a class="header-link" href="admin.php">Admin</a></li>
									<?php
								}

							?>
								<li class="li"><a class="header-link" href="deconnexion.php">Déconnexion</a></li>
						<?php
								}
						
						?>
					</ul>
				</nav>
			</article>
	  	</section>
	</header>
