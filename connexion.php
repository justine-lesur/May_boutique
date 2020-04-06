<?php
require "justine-class.php";
include('header.php');
$var = new user;

$var->connect();
?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Document sans titre</title>
</head>

<body>
	<form method="post" action="connexion.php">
		<input type="text" name="login" placeholder="Login" required/>
		<input type="password" name="password" placeholder="Mot de passe" required/>
		<input type="submit" name="valider"/>
	</form>
</body>
</html>