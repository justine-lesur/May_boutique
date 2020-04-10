<?php

session_start();

ob_start();

////////// UTILISATEURS //////////

$connexion = mysqli_connect("localhost","root","","boutique");
$requete_user = "SELECT * FROM `utilisateurs` WHERE id_droits = 1";
$query_user = mysqli_query($connexion, $requete_user);
$resultat_user = mysqli_fetch_all($query_user);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<?php

// if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): ?>

        <main>
            <section>

<!-- ////////// TABLEAU UTILISATEURS ////////// -->

                <table>
                    <thead>
                        <tr>
                            <th>Login</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
<?php 
                    foreach($resultat_user as $users):
?>
                        <tr>
                            <td><?php echo $users[1] ?></td>
                            <td><?php echo $users[2] ?></td>
                            <td><?php echo $users[3] ?></td>
                            <td><a href="delete.php?id=<?php echo $users[0] ?>"><img src="img/Button-Delete-icon.png" alt="delete" id="but-img-del"></a></td>
                        </tr>
<?php
                    endforeach;
?>
                    </tbody>
                </table>
            </section>
        </main>
    </body>
</html>