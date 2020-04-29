        <footer>
            <img src="css/img-css/may.png" class="may"/>
    <?php foreach($res_cat as $categories):
// var_dump($categories);
	    $idcat = $categories[0];
        $namecat = $categories[1]; ?>
            <ul class="ul">
                <li class="li foot-li-cat"><a href="produits.php?cat=<?php echo $idcat ?>" class="footer-link"><?php echo strtoupper($namecat)."<br/>" ?></a></li>
                <?php $connexion = mysqli_connect("localhost","root","","boutique") ?>
                <?php $requete_typ = "SELECT DISTINCT a.id_type, t.nom FROM articles a INNER JOIN types t ON a.id_type = t.id WHERE id_categorie = '".$idcat."'";
                $query_typ = mysqli_query($connexion,$requete_typ);
                $res_typ = mysqli_fetch_all($query_typ);
                // var_dump($res_typ);
                ?>
                
                <?php foreach($res_typ as $types):
                    $idtype = $types[0];
                    $nametype = $types[1]; ?>
                    <li class="li"><a href="produits.php?cat=<?php echo $idcat ?>&type=<?php echo $idtype ?>" class="footer-link"><?php echo ucfirst($nametype) ?></a></li>
                <?php endforeach; ?> 
            </ul>	  
	<?php endforeach;
                if (isset($_SESSION['login']))
                    {
                ?>
                    <ul class="ul">
					    <li  class="li foot-li-cat"><a href="mon-profil.php" class="footer-link">PROFIL</a></li>
     				    <li  class="li"><a href="mon-profil.php#locat" class="footer-link">Historique d'achats</a></li>
                        <li  class="li"><a href="deconnexion.php" class="footer-link">Se Déconnecter</a></li>
                    </ul>
                <?php
                    }
                ?>
        </footer>
    </body>
</html>