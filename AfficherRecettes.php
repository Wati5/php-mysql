<?php
include_once('variables.php');
include_once('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Liste des recettes activées</h1>
    <ul>
        <?php foreach (getRecipes($recipes) as $recipe): ?>
            <li>
                <h2><?php echo $recipe['title']; ?></h2>
                <p>Recette par : <?php echo displayAuthor($recipe['author'], $users); ?></p>
                <p><?php echo $recipe['recipe']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
