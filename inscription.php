<!doctype html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="description" content="">
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
		<title>May - Inscription</title>
</head>
<body>
<section class="image-background">
<?php
	include('header.php');
?>
<h1 class="hashtag">#inscription</h1>
</section>
<h2 class="inscription">Inscription</h2>
	<section class="formulaire">
		<form method="post" action="inscription.php" class="foorm">
			<input type="text" name="login" class="input" placeholder="Login" required/>
	   	 	<input type="mail" name="email" class="input" placeholder="Adresse Mail*" required/>
			<input type="password" name="password" class="input" placeholder="Mot de passe" required/>
			<input type="password" name="repeatpassword"  class="input" placeholder="Confirmer le Mot de Passe*" required/>
			<input type="submit" name="valider" class="submit" value="S'inscrire"/>
		</form>
<?php
	require "justine-class.php";
	$var = new user;
	$var->inscription();
?>
	</section>
<?php
	include('footer.php');
?>
</body>
</html>