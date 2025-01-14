<?php

session_start();
// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: index.php");
    exit; // Arrêtez l'exécution du script
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclure le fichier de classe contenant la méthode creerTache
    require_once 'config.php';

    // Récupérer les valeurs du formulaire
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $dateEcheance = $_POST['dateEcheance'];
    $priorite = $_POST['priorite'];
    $etat = 'à faire'; // Définissez l'état initial
    $idUtilisateur = $_SESSION['id']; // Obtenez l'ID de l'utilisateur à partir de la session
    $tache = new Tache($connexion, "Acheter des fournitures de bureau", "Acheter des stylos, des cahiers, etc.", "2024-04-30", "Haute", "En cours", 1);
   
    // Appeler la méthode creerTache pour créer une nouvelle tâche
    $tache->creerTache($libelle, $description, $dateEcheance, $priorite, $etat, $idUtilisateur);

    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tâche</title>
    <link rel="stylesheet" href="update.css">
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
    <div class="titre"><h1 >Créer une tâche</h1></div>
    <form method="post" action="">
        <div class="form-group">
            <label for="libelle">Libellé :</label>
            <input type="text" class="form-control" id="libelle" name="libelle" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="dateEcheance">Date et heure d'échéance :</label>
            <input type="datetime-local" class="form-control" id="dateEcheance" name="dateEcheance" required>
        </div>
        <div class="form-group">
            <label for="priorite">Priorité :</label>
            <select class="form-control" id="priorite" name="priorite" required>
                <option value="faible">Faible</option>
                <option value="moyenne">Moyenne</option>
                <option value="élevée">Élevée</option>
            </select>
        </div>
        <!-- Ajoutez d'autres champs selon vos besoins -->
        <button type="submit" class="btn btn-primary">Créer la tâche</button>
    </form>

<style>


.form-control {
    padding: 12px 20px;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 30px;
    border-bottom: 1px solid var(--couleur-positive); /* Assurez-vous de définir la variable --couleur-positive */
    border-top: none;
    border-left: none;
    border-right: none;
    border-radius: 20px;
    height: 50px;
}


button[type="submit"] {
    background-color: var(--couleur-principale); 
    border-color: var(--couleur-fond); 
    font-family: Roboto;
    border: none;
    border-radius: 20px;
    padding: 12px 20px;
    font-size: 18px;
    cursor: pointer;
    margin-bottom: 60px;
}

button[type="submit"]:hover {
    background-color: var(--couleur-positive);
    color:var(--couleur-fond);
    font-size: 24px;
    font-weight: bold;
}
</style>



    </div>
</body>
</html>