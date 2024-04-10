<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Intégration de Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Lien vers votre fichier CSS personnalisé -->
    <link rel="stylesheet" href="style.css">


</head>
<body >
<div class="container shadow-lg ">
    <div class="row">
        <div class="partie-icon col-md-6 d-flex flex-column justify-content-center align-items-center ">
                <div class="icon-container">
                <i class="fas fa-user fa-5x" style="color: white;"></i>
                </div>
                <h2>Connexion</h2>
        </div>
        <div class="col-md-6 ">
            <div class="custom-login-form">
                <form action="login_session.php" method="POST"> <!-- Correction ici: action pointe vers login_session.php -->
                <div class="form-group ">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope fa-xl"></i></span>
                        </div>
                        <input type="email" class="form-control " id="email" name="email" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock fa-xl"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password" name="mot_de_passe" placeholder="Mot de passe" required>
                    </div>
                </div>

                    <button type="submit" class="btn btn-primary btn-block custom-btn-primary">CONNECTER</button>
                </form>
                <p class="mt-3">Pas encore inscrit ? <a href="inscription.php" class="custom-btn-secondary">Inscrivez-vous ici</a></p>
            </div>
        </div>
        
    </div>
</div>

    <!-- Intégration de Bootstrap JavaScript (optionnel) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
