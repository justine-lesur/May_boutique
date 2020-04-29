<?php
include("justine-class.php");
$achat = new achat;
$nouveautes = $achat->newarticles();
$fan = new fan;
$newfan = $fan->fanarticles();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>May - Boutique de vêtements en ligne</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>
	<section class="accueil">
		<?php
			include('header.php');
		?>
		<h1 class="maystore">Maystore</h1>
	</section>
	
	<h2 class="nouveautes">#Nouveautés</h2>
	<article class="titre">
		<img src="css/img-css/trait.png" class="trait"/>
	</article>
	
	<section class="all-articles">
	
		<?php
			while($donnees = mysqli_fetch_array($nouveautes))
            {
				echo "<img src='".$donnees[0]."' class='articles-accueil'/><br />";
			}
		?>
	</section>
	
	<article class="link">
		<a class="voirplus" href="articles.php" target="_blank">Voir plus</a>
	</article>
	
	<h2 class="produitsphares">#Produitsphares</h2>
	<article class="titre">
		<img src="css/img-css/trait.png" class="trait2"/>
	</article>
	<section class="all-articles">
		<?php
			while($donnees = mysqli_fetch_array($newfan))
            {
				echo "<img src='".$donnees[0]."' class='articles-accueil'/><br />";
			}
		?>
	</section>
	<article class="link">
		<a class="voirplus" href="articles.php" target="_blank">Voir plus</a>
	</article>
	<?php
		include('footer.php');	
	?>

</body>
</html>