<?php
require "justine-class.php";
$var = new user;

$var->connect();
?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>May - Connexion</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>

<body>
<section class="image-background">
<?php
include('header.php');
?>
<h1 class="hashtag">#Connexion</h1>
</section>
<h2 class="inscription">Connexion</h2>
<section class="formulaire">
	<form method="post" action="connexion.php"  class="foorm">
		<input type="text" name="login" class="input" placeholder="Login" required/>
		<input type="password" name="password" class="input" placeholder="Mot de passe" required/>
		<input type="submit" name="valider" class="submit" value="Se connecter"/>
	</form>
</section>
<?php
	include('footer.php');
?>
</body>
</html>