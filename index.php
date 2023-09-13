<!-- index.php -->
<?php
session_start(); // Démarrer la session
session_regenerate_id(true);
include_once('header.php');
include_once('variables.php');
include_once('functions.php');
include_once('login.php'); // Inclure le fichier de connexion
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Site de recettes</h1>

        <!-- inclusion des variables et fonctions -->
        <?php
            include_once('variables.php');
            include_once('functions.php');
        ?>
        


        <!-- inclusion de l'entête du site -->
        <?php include_once('login.php'); ?>
        <!-- Ne pas inclure l'entête ici car elle est déjà incluse dans le header.php -->

    <?php if(isset($_SESSION['loggedUser'])): // Vérifier si l'utilisateur est connecté ?>
        

        <?php foreach(getrecipes($recipes, $limit =10) as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
            </article>
        <?php endforeach ?>
    <?php endif; ?>

    </div>
    <?php 
    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php'); // Redirigez l'utilisateur vers la page d'accueil après la déconnexion
        exit;
    }
    ?>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>
