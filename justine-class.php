<?php
session_start();
?>

<?php

	class user{
		
		private $host = 'localhost';
		private $username = 'root';
		private $password = '';
		public $db= 'boutique';

		public function inscription()
		{
			$connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);
	
			if (isset($_POST['valider']))
			{
				$login = $_POST['login'];
				$password = $_POST['password'];
				$repeatpassword = $_POST['repeatpassword'];
				$email = $_POST['email'];
			
			
				if (!empty($login) && !empty($password) && !empty($repeatpassword) && !empty($email))
				{
				
					if ($password == $repeatpassword)
					{
						$nouveaulogin = "SELECT * FROM utilisateurs WHERE login='" . $login . "'";
						$reg = mysqli_query($connect, $nouveaulogin);
						$rows = mysqli_num_rows($reg);
					
						if(empty($rows))
						{
							$mdp = password_hash($_POST['password'], PASSWORD_BCRYPT,array ('cost'=> 12));
							$query = "INSERT INTO utilisateurs (login, password, email, id_droits) VALUES ('$login','$mdp','$email','1')";
							mysqli_query($connect, $query);
							header('location: connexion.php');
						
						} else {
						echo '<p>Ce pseudo est indisponible</p>';
					}
						
					} else {
						echo '<p>Les deux mots de passe doivent être identiques</p>';
					}
				
				} else {
					echo '<p>Veuillez saisir tous les champs</p>';
				}
		    }
		}
		

		public function connect()
		{
			if (isset($_POST['valider']))
			{
				
				$login = $_POST['login'];
				$password = $_POST['password'];
			
				if ($login && $password)
				{
					
					$connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				    $query = "SELECT * FROM utilisateurs WHERE login = '".$login."'";
					$reg = mysqli_query($connect,$query);
					$rows= mysqli_fetch_assoc($reg);
					mysqli_close($connect);
				
					if ($login == $rows ['login'])
					{
						if (password_verify($_POST['password'],$rows['password']))
						{
							$_SESSION['login']=$login;
							$_SESSION['password']=$password;
							header("Location: index.php");
					
						} else echo "<p>Login ou Mot de passe incorrect</p>";
				
					} else echo "<p>Login ou Mot de passe incorrect</p>";
			
				} else echo "<p>Veuillez saisir tous les champs</p>";
			}
	 	}
		
		public function updatelogin()
		{
			if(isset($_POST['submit2'])) 
			{
				$login = $_POST['login2'];
				$password = $_POST['motdepasse'];
		
				if(!empty($login) && !empty($password))
				{
					$connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);
					$query = "SELECT * FROM utilisateurs WHERE login ='". $login . "' limit 1";
					$reg = mysqli_query ($connect,$query);
					/*permet de lire/retourner une ligne du tableau, la première par défaut*/
					$rows = mysqli_num_rows($reg);
					//BON JE TE FAIS LES BONNES PRATIQUES EN MEME TEMPS
					
					if(!empty($rows)){
						echo "Le pseudo est déjà utilisé";
						exit;
					}
					
					$query2 = "SELECT password FROM utilisateurs WHERE login ='". $_SESSION['login'] . "' limit 1";
					$reg2 = mysqli_query ($connect,$query2);
					$rows2 = mysqli_fetch_assoc($reg2);
					if(!password_verify($_POST['motdepasse'], $rows2['password']))
					{
						echo "<p>Pseudo ou Mot de passe incorrect</p>";	
					}
					$query3 = "UPDATE utilisateurs SET login = '".$login."' WHERE login = '".$_SESSION['login']."'";
						$reg3 = mysqli_query($connect, $query3);
					
			
				} else {
					echo "<p>Veuillez saisir tous les champs</p>";
				}
	
			} 
		}
		
		
		public function updatepassword()
		{
			if(isset($_POST['submit3']))
			{
				$ancienpassword = $_POST['ancienmotdepasse'];
				$newpassword = $_POST['nouveaumotdepasse'];


		if(empty($newpassword) || empty($ancienpassword)) 
		{
			echo "<p>Veuillez saisir tous les champs</p>";
		}

			$connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$query = "SELECT password FROM utilisateurs WHERE login = '" . $_SESSION["login"] . "'";
			$reg = mysqli_query ($connect,$query);
			/*permet de lire/retourner une ligne du tableau, la première par défaut*/
			$rows = mysqli_fetch_assoc($reg);

			if(!password_verify($ancienpassword, $rows['password']))
			{
				echo "<p>Mot de passe incorrect</p>";
			}

			$query2 = "UPDATE utilisateurs SET password = '".password_hash($newpassword, PASSWORD_DEFAULT)."' WHERE login = '".$_SESSION["login"]."'";
			$reg2 = mysqli_query($connect, $query2);
			}
		}
	}

	class achat {
		
		private $host = 'localhost';
		private $username = 'root';
		private $password = '';
		public $db= 'boutique';
		
		public function newarticles()
		{
			$connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$query = "SELECT image FROM articles ORDER BY date DESC LIMIT 3";
			$rows = mysqli_query($connect,$query);
			return($rows);
		}
	}

	class produits {
		
		private $host = 'localhost';
		private $username = 'root';
		private $password = '';
		public $db= 'boutique';
		
		public function ordrefemme()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM `articles` WHERE id_categorie = 1 ORDER BY date DESC";
			$query = mysqli_query($connexion, $requete);
			$resultat = mysqli_fetch_all($query);

			$requete1 = "SELECT * FROM `articles` WHERE id_categorie = 1 ORDER BY prix ASC";
			$query1 = mysqli_query($connexion, $requete1);
			$resultat1 = mysqli_fetch_all($query1);

			$requete2 = "SELECT * FROM `articles` WHERE id_categorie = 1 ORDER BY prix DESC";
			$query2 = mysqli_query($connexion, $requete2);
			$resultat2 = mysqli_fetch_all($query2);
			?>
			<section>
				<form action="" method="post">
					<select name="selectorder" id="essai">
						<option value="recent">Plus Récent</option>
						 <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"){ echo "selected"; } ?> value="prixmini">Plus Bas Prix</option>
						<option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"){ echo "selected"; } ?> value="prixmax">Prix Le Plus Élevé</option>
						<input type="submit">    
					</select>
				</form>
			</section>
			<section>
				<?php
				if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "recent"):
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"):
					foreach($resultat1 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"):
					foreach($resultat2 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				else:
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				endif; ?>
			 </section> 
<?php
		}
		
			public function ordrehomme()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM `articles` WHERE id_categorie = 2 ORDER BY date DESC";
			$query = mysqli_query($connexion, $requete);
			$resultat = mysqli_fetch_all($query);

			$requete1 = "SELECT * FROM `articles` WHERE id_categorie = 2 ORDER BY prix ASC";
			$query1 = mysqli_query($connexion, $requete1);
			$resultat1 = mysqli_fetch_all($query1);

			$requete2 = "SELECT * FROM `articles` WHERE id_categorie = 2 ORDER BY prix DESC";
			$query2 = mysqli_query($connexion, $requete2);
			$resultat2 = mysqli_fetch_all($query2);
			?>
			<section>
				<form action="" method="post">
					<select name="selectorder" id="essai">
						<option value="recent">Plus Récent</option>
						 <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"){ echo "selected"; } ?> value="prixmini">Plus Bas Prix</option>
						<option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"){ echo "selected"; } ?> value="prixmax">Prix Le Plus Élevé</option>
						<input type="submit">    
					</select>
				</form>
			</section>
			<section>
				<?php
				if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "recent"):
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"):
					foreach($resultat1 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"):
					foreach($resultat2 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				else:
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				endif; ?>
			 </section> 
<?php
		}
		
			public function ordrehauthomme()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM `articles` WHERE id_categorie = 2 AND id_type = 1 ORDER BY date DESC";
			$query = mysqli_query($connexion, $requete);
			$resultat = mysqli_fetch_all($query);

			$requete1 = "SELECT * FROM `articles` WHERE id_categorie = 2 AND id_type = 1 ORDER BY prix ASC";
			$query1 = mysqli_query($connexion, $requete1);
			$resultat1 = mysqli_fetch_all($query1);

			$requete2 = "SELECT * FROM `articles` WHERE id_categorie = 2 AND id_type = 1 ORDER BY prix DESC";
			$query2 = mysqli_query($connexion, $requete2);
			$resultat2 = mysqli_fetch_all($query2);
			?>
			<section>
				<form action="" method="post">
					<select name="selectorder" id="essai">
						<option value="recent">Plus Récent</option>
						 <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"){ echo "selected"; } ?> value="prixmini">Plus Bas Prix</option>
						<option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"){ echo "selected"; } ?> value="prixmax">Prix Le Plus Élevé</option>
						<input type="submit">    
					</select>
				</form>
			</section>
			<section>
				<?php
				if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "recent"):
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"):
					foreach($resultat1 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"):
					foreach($resultat2 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				else:
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				endif; ?>
			 </section> 

<?php
		}
			public function ordrepantalonhomme()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM `articles` WHERE id_categorie = 2 AND id_type = 4 ORDER BY date DESC";
			$query = mysqli_query($connexion, $requete);
			$resultat = mysqli_fetch_all($query);

			$requete1 = "SELECT * FROM `articles` WHERE id_categorie = 2 AND id_type = 4 ORDER BY prix ASC";
			$query1 = mysqli_query($connexion, $requete1);
			$resultat1 = mysqli_fetch_all($query1);

			$requete2 = "SELECT * FROM `articles` WHERE id_categorie = 2 AND id_type = 4 ORDER BY prix DESC";
			$query2 = mysqli_query($connexion, $requete2);
			$resultat2 = mysqli_fetch_all($query2);
			?>
			<section>
				<form action="" method="post">
					<select name="selectorder" id="essai">
						<option value="recent">Plus Récent</option>
						 <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"){ echo "selected"; } ?> value="prixmini">Plus Bas Prix</option>
						<option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"){ echo "selected"; } ?> value="prixmax">Prix Le Plus Élevé</option>
						<input type="submit">    
					</select>
				</form>
			</section>
			<section>
				<?php
				if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "recent"):
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"):
					foreach($resultat1 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"):
					foreach($resultat2 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				else:
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				endif; ?>
			 </section> 
<?php
		}
		
			public function ordreshorthomme()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM `articles` WHERE id_categorie = 2 AND id_type = 5 ORDER BY date DESC";
			$query = mysqli_query($connexion, $requete);
			$resultat = mysqli_fetch_all($query);

			$requete1 = "SELECT * FROM `articles` WHERE id_categorie = 2 AND id_type = 5 ORDER BY prix ASC";
			$query1 = mysqli_query($connexion, $requete1);
			$resultat1 = mysqli_fetch_all($query1);

			$requete2 = "SELECT * FROM `articles` WHERE id_categorie = 2 AND id_type = 5 ORDER BY prix DESC";
			$query2 = mysqli_query($connexion, $requete2);
			$resultat2 = mysqli_fetch_all($query2);
			?>
			<section>
				<form action="" method="post">
					<select name="selectorder" id="essai">
						<option value="recent">Plus Récent</option>
						 <option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"){ echo "selected"; } ?> value="prixmini">Plus Bas Prix</option>
						<option <?php if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"){ echo "selected"; } ?> value="prixmax">Prix Le Plus Élevé</option>
						<input type="submit">    
					</select>
				</form>
			</section>
			<section>
				<?php
				if(isset($_POST["selectorder"]) && $_POST["selectorder"] == "recent"):
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmini"):
					foreach($resultat1 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				elseif(isset($_POST["selectorder"]) && $_POST["selectorder"] == "prixmax"):
					foreach($resultat2 as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				else:
					foreach($resultat as $article): ?>
						<article>
								<a href="produit.php?id=<?php echo $article[0]?>"><img src="<?php echo $article[4]?>" alt="mode"></a>
								<h3><?php echo $article[1] ?></h3>
								<span><?php echo $article[6] ?> €</span>
						</article>
					<?php endforeach;
				endif; ?>
			 </section> 
<?php
	}
}
?>



