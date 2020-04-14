<?php

session_start();

ob_start();

////////// UTILISATEURS //////////

$connexion = mysqli_connect("localhost","root","","boutique");
$requete_user = "SELECT * FROM `utilisateurs` WHERE id_droits = 1";
$query_user = mysqli_query($connexion, $requete_user);
$resultat_user = mysqli_fetch_all($query_user);

$requete_admin = "SELECT * FROM `utilisateurs` WHERE id_droits = 10";
$query_admin = mysqli_query($connexion, $requete_admin);
$resultat_admin = mysqli_fetch_all($query_admin);


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

        <main class="main-container">
            <section class="sec-container">
                <nav class="nav-container">
                    <ul class="ul-container">
                        <a href="admin.php" class="lien-nav lien-nav2 lien-lonely2"><li>Admin</li></a>
                        <a href="creer-produit.php" class="lien-nav lien-nav2 lien-lonely3"><li>Créer un produit</li></a>
                        <a href="edit-user-admin.php" class="lien-nav lien-lonely"><li>Gestion utilisateurs</li></a>
                        <a href="gestion-categorie.php" class="lien-nav lien-nav2 lien-lonely4"><li>Gestion catégories</li></a>
                        <a href="" class="lien-nav lien-nav2 lien-lonely5"><li>Gestion commandes</li></a>
                        <a href="topsale-admin.php" class="lien-nav lien-nav2 lien-lonely6"><li>Top 5 ventes</li></a>
                    </ul>
                </nav>
                <section class="sec-container2">
                    <div class="box-title">
                        <h1 class="title-admin">Espace droits utilisateurs</h1>
                    </div>
<!-- ////////// TABLEAU UTILISATEURS ////////// -->
                    <div id="flex-divuser">
                        <article id="art-user">
                            <div>
                                <h2 id="title-droit-user">Utilisateurs</h2>
                            </div>
                            <table id="table-droit-user">
                                <thead>
                                    <tr id="tr-foruser">
                                        <th>ID</th>
                                        <th>LOGIN</th>
                                        <th>EMAIL</th>
                                        <th>DROITS</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-droit-user">

<?php foreach($resultat_user as $users): ?>

                                    <tr>
                                        <td><?php echo $users[0] ?></td>
                                        <td><?php echo $users[1] ?></td>
                                        <td><?php echo $users[3] ?></td>
                                        <td><a href="upgrade-droit.php?id=<?php echo $users[0] ?>"><img src="img/admin.png" alt="admin" id="img-upadmin"></a></td>
                                        <td><a href="delete-user.php?id=<?php echo $users[0] ?>"><img src="img/Button-Delete-icon.png" alt="delete" id="img-del-user"></a></td>
                                    </tr>

<?php endforeach; ?>

                                </tbody>
                            </table>
                        </article>

                        <article id="art-admin">
                            <div>
                                <h2 id="title-droit-admin">Administrateurs</h2>
                            </div>
                            <table id="table-droit-admin">
                                <thead>
                                    <tr id="tr-foradmin">
                                        <th>ID</th>
                                        <th>LOGIN</th>
                                        <th>EMAIL</th>
                                        <th>DROITS</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-droit-user">

<?php foreach($resultat_admin as $admin): ?>

                                    <tr>
                                        <td><?php echo $admin[0] ?></td>
                                        <td><?php echo $admin[1] ?></td>
                                        <td><?php echo $admin[3] ?></td>
                                        <td><a href="demote-droit.php?id=<?php echo $admin[0] ?>"><img src="img/user.png" alt="user" id="img-downuser"></a></td>
                                        <td><a href="delete-user.php?id=<?php echo $admin[0] ?>"><img src="img/Button-Delete-icon.png" alt="delete" id="img-del-user"></a></td>
                                    </tr>

<?php endforeach; ?>

                                </tbody>
                            </table>
                        </article>
                    </div>
                </section>
            </section>
        </main>
<?php
ob_end_flush();
// endif; ?>
    </body>
</html>