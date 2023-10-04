<? php session_start(); 

include_once('mysql.php');
include_once('login.php');
include_once('variables.php');

if (
    !isset($_POST['titles'])
    || !isset($_POST['recipe']
)
{
    echo'il faut un titre et une recette pour soumettre le formulaire';
    return ;
}

$title = $_POST['titles'];
$recipe = $_POST['recipe'];

$insertRecipe = $mysqlClient->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES(:title, :recipe, :author, :is_enabled)');
$insertRecipe ->execute ([
    'title' => $title,
    'recipe' => $recipe,
    'is_enabled' =>1,
    'author' => $loggedUser['email'],
])

?>
