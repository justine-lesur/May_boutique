<?php
require "justine-class.php";
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>May - Boutique</title>
<link rel="stylesheet" href="css/boutique.css" type="text/css"/>
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
			<?php
				include('footer.php');
			?>
	</section>
</body>
</html>