<?php
include("justine-class.php");
$achat = new achat;
$nouveautes = $achat->newarticles();

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Document sans titre</title>
<link rel="stylesheet" href="css/boutique.css" type="text/css"/>
</head>

<body>
<?php
include('header.php');
	
	while($donnees = mysqli_fetch_array($nouveautes))
            {
				echo "<img src='".$donnees[0]."'/><br />";
			}
include('footer.php');	
?>
</body>
</html>