<?php
require "justine-class.php";
$var = new user;

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Document sans titre</title>
</head>

<body>
<?php
include('header.php');
?>
	<form method="post">
		<section>
		<?php $var->updatelogin();?>
		<h1 class="modifier">Modifier mon identifiant</h1>
		<label>
			<input type="text" name="login2" placeholder="Nouvel identifiant*" required/><br/>
		</label>
		<label>
			<input type="password" name="motdepasse" placeholder="Mot de passe*" required/><br/>
		</label>
		<label>
	  		<input type="submit" name="submit2" value="Valider" />
	 	</label>
	</form>
	</section>
	
	<section>
	<?php $var->updatepassword();?>
	<form method="post">
		<h1 class="modifier">Modifier mon mot de passe</h1>
		<label>
			<input type="password" name="ancienmotdepasse" placeholder="Ancien mot de passe*" required/><br/>
		</label>
		<label>
			<input type="password" name="nouveaumotdepasse" placeholder="Nouveau mot de passe*" required/><br/>
		</label>
		<label>
	  		<input type="submit" name="submit3" value="Valider" />
	 	</label>
	</form>
	</section>
</body>
</html>