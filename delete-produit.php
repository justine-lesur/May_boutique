<?php

    session_start();

    require "database.php";

    if(!empty($_GET["id"]))
    {
        $id = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
    }

    if(!empty($_POST))
    {
        $id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
        $bdd = Database::connect();
        $requete = $bdd->prepare("DELETE FROM articles WHERE id = :id");
        $requete->execute([
            ":id" => $id,
        ]);
        Database::disconnect();
        header("Location:admin.php");
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Material-design-icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
    <?php if(!empty($_SESSION["login"]) && $_SESSION["id_droits"] == 10): ?>
        <a href="index.php"><img src="img/53494.png" alt="leave" class="leave-admin"></a>
        <main class="main-container">
            <section class="sec-container">
                <nav class="nav-container">
                    <ul class="ul-container">
                        <a href="admin.php" class="lien-nav lien-lonely"><li>Admin</li></a>
                        <a href="creer-produit.php" class="lien-nav lien-nav2 lien-lonely2"><li>Créer un produit</li></a>
                        <a href="edit-user-admin.php" class="lien-nav lien-nav2 lien-lonely3"><li>Gestion utilisateurs</li></a>
                        <a href="gestion-categorie.php" class="lien-nav lien-nav2 lien-lonely4"><li>Gestion catégories</li></a>
                        <a href="display-commandes.php" class="lien-nav lien-nav2 lien-lonely5"><li>Gestion commandes</li></a>
                        <a href="topsale-admin.php" class="lien-nav lien-nav2 lien-lonely6"><li>Top 5 ventes</li></a>
                    </ul>
                </nav>
                <section class="sec-container2">
                    <div class="container">
                        <div class="row flex-column">
                            <div id="del-box-title">
                                <h1 id="title-admin2">Supprimer un produit</h1>
                            </div>

                            <form class="form" role="form" action="delete-produit.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <p class="alert alert-warning">Êtes-vous sûr de vouloir supprimer ce produit ?</p>
                                <div class="form-action">
                                    <button type="submit" class="btn btn-warning">
                                        Oui
                                    </button>
                                    <a href="admin.php" class="btn border">Non</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </section>
        </main>
    <?php elseif(empty($_SESSION["login"]) || $_SESSION["id_droits"] == 1): ?>
            <section class="bg-error">
                <article class="art-error">
                    <div class="div-errtitle">
                        <h4 class="error-title">Vous n'avez pas accès à cette page</h4>
                    </div>
                    <div class="div-erradm">
                        <p class="error-admin"><?php echo "Vous devez être connecté en tant qu'administrateur pour accéder a cette page"; ?></p>
                    </div>
                    <div class="div-lienerr">
                        <a href="index.php" class="lien-error">Cliquez ici</a>
                    </div>
                    <div class="div-erradm2">  
                        <p class="error-admin">pour revenir a la page d'accueil.</p>
                    </div>
                </article>
            </section>
    <?php endif; ?>
    </body>
</html>