<?php

session_start();

$connexion = mysqli_connect("localhost","root","","boutique");

$requete = "SELECT * FROM articles WHERE id= '".$_GET["id"]."'";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);
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
<?php
         foreach($resultat as $article): ?>
                <article>
                        <img src="<?php echo $article[4]?>" alt="mode"></a>
                        <h3><?php echo $article[1] ?></h3>
                        <span><?php echo $article[6] ?> €</span>
						<h3>Description</h3>
						<p><?php echo $article[5] ?> </p>
                </article>
            <?php endforeach;
?>
        <form action="" method="post">
            <select name="select" id="selection">
                <option value="S">Taille S</option>
				 <option value="M">Taille M</option>
                <option value="L">Taille L</option>
                <input type="submit" name="valider">    
            </select>
        </form>
</body>
</html>