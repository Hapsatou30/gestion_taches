

<?php
// Initialisation du tableau des erreurs
$erreurs = array();

// Vérification des données soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation du prénom
    if (empty($_POST['prenom'])) {
        $erreurs['prenom'] = "Le prénom est requis.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\- ]*$/", $_POST['prenom'])) {
        $erreurs['prenom'] = "Le prénom ne peut contenir que des lettres et des espaces.";
    }

    // Validation du nom
    if (empty($_POST['nom'])) {
        $erreurs['nom'] = "Le nom est requis.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\- ]*$/", $_POST['nom'])) {
        $erreurs['nom'] = "Le nom ne peut contenir que des lettres et des espaces.";
    }

    // Validation de l'email
    if (empty($_POST['email'])) {
        $erreurs['email'] = "L'email est requis.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "L'email n'est pas valide.";
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="inscription.css"> 
</head>
<body>
    <div class="container">
        <div class="titre">
            <h2 class="mt-5">Inscription</h2>
        </div>
        <form action="addUser.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control <?php echo (isset($erreurs['prenom'])) ? 'is-invalid' : ''; ?>" id="prenom" name="prenom" placeholder="Prénom" required>
                <?php if (isset($erreurs['prenom'])) { ?>
                    <div class="invalid-feedback">
                        <?php echo $erreurs['prenom']; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control <?php echo (isset($erreurs['nom'])) ? 'is-invalid' : ''; ?>" id="nom" name="nom" placeholder="Nom" required>
                <?php if (isset($erreurs['nom'])) { ?>
                    <div class="invalid-feedback">
                        <?php echo $erreurs['nom']; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <input type="email" class="form-control <?php echo (isset($erreurs['email'])) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email" required>
                <?php if (isset($erreurs['email'])) { ?>
                    <div class="invalid-feedback">
                        <?php echo $erreurs['email']; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control <?php echo (isset($erreurs['password'])) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Mot de passe" required>
                <?php if (isset($erreurs['password'])) { ?>
                    <div class="invalid-feedback">
                        <?php echo $erreurs['password']; ?>
                    </div>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block">S'INSCRIRE</button>
        </form>
        <p class="mt-3">Déjà inscrit ? <a href="index.php">Connectez-vous ici</a></p>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>