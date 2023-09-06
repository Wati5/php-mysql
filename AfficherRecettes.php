<?php
function isValidRecipe(array $recipe) : bool {
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }
    return $isEnabled;
}

function getRecipes(array $recipes) : array {
    $validRecipes = [];
    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }
    return $validRecipes;
}

function displayAuthor(string $authorEmail, array $users) : string {
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }
    return ''; 
}

$users = [
    [
        'email' => 'laurene.castor@exemple.com',
        'full_name' => 'Laurene Castor',
        'age' => 30,
    ],
    [
        'email' => 'mickael.andrieu@exemple.com',
        'full_name' => 'Mickael Andrieu',
        'age' => 34,
    ],
    [
        'email' => 'mathieu.nebra@exemple.com',
        'full_name' => 'Mathieu nebra',
        'age' => 38,
    ],
    
];

$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 aller sur Marmiton , Etape 2 Suivre la recette ',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Recette du couscous...',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 aller sur Marmiton , Etape 2 Suivre la recette',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => 'Etape 1 aller sur Marmiton , Etape 2 Suivre la recette',
        'author' => 'laurene.castor@exemple.com',
        'is_enabled' => true,
    ]
];

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
