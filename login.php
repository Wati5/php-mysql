<?php
    
    include_once('variables.php');

// Validation du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {
    foreach ($users as $user) {
        if ($_POST['email'] === $user['email'] && $_POST['password'] === $user['password']) {
            $_SESSION['loggedUser'] = $user['email'];
            break; // Sortir de la boucle dès qu'un utilisateur correspondant est trouvé.
        } 
        
        else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s', $_POST['email'], $_POST['password']);
        }
        
    }
}
?>

<!-- Si l'utilisateur/trice est non identifié(e), on affiche le formulaire -->
<?php if (!isset($_SESSION['loggedUser'])) : ?>
    <form action="index.php" method="POST">
        <!-- si message d'erreur on l'affiche -->
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@example.com">
            <div id="email-help" class="form-text">
                L'email utilisé lors de la création de compte.
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

<!-- Si utilisateur/trice bien connectée, on affiche un message de succès -->
<?php else: ?>
    <div class="alert alert-success" role="alert">
        Bonjour et bienvenue sur le site  <?php echo $_SESSION['loggedUser']; ?>
    </div>
<?php endif; ?>
