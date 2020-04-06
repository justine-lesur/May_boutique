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
							echo 'je suis connecté';
					
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
					$query3 = "UPDATE utilisateur SET login = '".$login."' WHERE login = '".$_SESSION['login']."'";
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
  
?>