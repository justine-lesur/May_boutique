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
						echo "<p class='message-erreur'>Ce pseudo est indisponible</p>";
					}
						
					} else {
						echo "<p class='message-erreur'>Les deux mots de passe doivent être identiques</p>";
					}
				
				} else {
					echo "<p class='message-erreur'>Veuillez saisir tous les champs</p>";
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
							$_SESSION['id']=$rows['id'];
							$_SESSION['login']=$login;
							$_SESSION['password']=$password;
							$_SESSION['id_droits']=$rows['id_droits'];
							header("Location: index.php");
					
						} else echo "<p class='message-erreur'>Login ou Mot de passe incorrect</p>";
				
					} else echo "<p class='message-erreur'>Login ou Mot de passe incorrect</p>";
			
				} else echo "<p class='message-erreur'>Veuillez saisir tous les champs</p>";
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
						echo "<p class='message-erreur'>Pseudo ou Mot de passe incorrect</p>";	
					}
					$query3 = "UPDATE utilisateurs SET login = '".$login."' WHERE login = '".$_SESSION['login']."'";
						$reg3 = mysqli_query($connect, $query3);
					
			
				} else {
					echo "<p class='message-erreur'>Veuillez saisir tous les champs</p>";
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
			echo "<p class='message-erreur'>Veuillez saisir tous les champs</p>";
		}

			$connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$query = "SELECT password FROM utilisateurs WHERE login = '" . $_SESSION["login"] . "'";
			$reg = mysqli_query ($connect,$query);
			/*permet de lire/retourner une ligne du tableau, la première par défaut*/
			$rows = mysqli_fetch_assoc($reg);

			if(!password_verify($ancienpassword, $rows['password']))
			{
				echo "<p class='message-erreur'>ot de passe incorrect</p>";
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

	class fan {
		
		private $host = 'localhost';
		private $username = 'root';
		private $password = '';
		public $db= 'boutique';
		
		public function fanarticles()
		{
			$connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete_achat = "SELECT image FROM articles ORDER BY achats DESC LIMIT 3";
			$rows = mysqli_query($connect,$requete_achat);
			return($rows);
		}
	}

	class produits {
		
		private $host = 'localhost';
		private $username = 'root';
		private $password = '';
		public $db= 'boutique';
		
			public function pageproduit()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM articles WHERE id= '".$_GET["id"]."'";
			$query = mysqli_query($connexion, $requete);
			$resultat = mysqli_fetch_all($query);
			        
			foreach($resultat as $article): ?>
					<article class="one-produit2">
					  <div>
                        <img src="<?php echo $article[4]?>" alt="mode" class='articles-produit'></a>
					  </div>
					  <div class="all-description">
                        <h3 class="titre-produit"><?php echo $article[1] ?></h3>
						<p class="description"><?php echo $article[5] ?> </p>
               
				<form action="panier.php" method="post">
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
					<h4 class="taille-quantite">Taille</h4>
					<select name="taille" id="taille" class="selection2">
						<option class="taille" value="S">Taille S</option>
					 	<option class="taille" value="M">Taille M</option>
						<option class="taille" value="L">Taille L</option>    
					</select>
					<h4 class="taille-quantite">Quantité</h4>
					<select name="quantite" id="quantite" class="selection">
						<option value="1">1</option>
					 	<option value="2">2</option>
						<option value="3">3</option>  
						<option value="4">4</option>
				   	<option value="5">5</option>  
					</select>
					<br/>
						<div class="price">
							<span class="prix"><?php echo $article[6] ?> €</span>
						</div>
					<br/>
					<input type="submit" name="submit" class="submit2">  
				</form>
				</div>
				</article>
			<?php
				if (isset($_POST['submit']))
				{
					$taille = $_POST['taille'];
					$quantite = $_POST['quantite'];
				}
			?>
            <?php endforeach;

		}
}
?>


