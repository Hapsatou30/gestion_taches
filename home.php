<?php
// Inclure le fichier de configuration de la base de données
require_once 'config.php';
// Démarrez ou reprenez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if(isset($_SESSION['id'])) {
    // Récupérez l'identifiant de l'utilisateur à partir de la session
    $idUtilisateur = $_SESSION['id'];
} else {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: index.php");
    exit; // Arrêtez l'exécution du script
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tâches</title>
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Inclure FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- CSS personnalisé pour Kanban -->
    <link rel="stylesheet" href="home.css">
</head>
<body>

<div class="container">
    <div class="row">
            <h1 class="col-md-9">Liste des Tâches</h1>
            <div class="col-md-3">
                <button class="btn btn-primary float-right"><a href="ajoutTache.php">Créer une tâche</a> </button>
            </div>
    </div>

    <div class="kanban">
        <div class="column" id="todo">
            <h2>À faire</h2>
            <?php
            // Récupérer les tâches à faire
            $taches_todo = $tache->afficherTachesEnAttente($idUtilisateur);

            // Afficher les tâches à faire
            foreach ($taches_todo as $tache) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $tache['libelle'] . "</h5>";
                echo "<p>";
                // Lien vers la page d'informations de la tâche
                echo "<a href='detailsache.php?id=" . $tache['id'] . "'><i class='fas fa-info-circle'></i></a> ";
                // Lien vers la page d'édition de la tâche
                echo "<a href='updateTache.php?id=" . $tache['id'] . "'><i class='fas fa-edit'></i></a> ";
                // Lien pour supprimer la tâche
                echo "<a href='deleteTache.php?id=" . $tache['id'] . "'><i class='fas fa-trash-alt'></i></a>";
                echo "</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="column" id="inprogress">
            <h2>En cours</h2>
            <?php
            $tache = new Tache($connexion, "Acheter des fournitures de bureau", "Acheter des stylos, des cahiers, etc.", "2024-04-30", "Haute", "En cours", 1);
   
            // Récupérer les tâches en cours
            $taches_en_cours = $tache->afficherTachesEnCours($idUtilisateur);

            // Afficher les tâches en cours
            foreach ($taches_en_cours as $tache) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $tache['libelle'] . "</h5>";
                echo "<p>";
                // Lien vers la page d'informations de la tâche
                echo "<a href='detailsache.php?id=" . $tache['id'] . "'><i class='fas fa-info-circle'></i></a> ";
                // Lien vers la page d'édition de la tâche
                echo "<a href='updateTache.php?id=" . $tache['id'] . "'><i class='fas fa-edit'></i></a> ";
                // Lien pour supprimer la tâche
                echo "<a href='deleteTache.php?id=" . $tache['id'] . "'><i class='fas fa-trash-alt'></i></a>";
                echo "</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

        <div class="column" id="completed">
            <h2>Terminées</h2>
            <?php
            $tache = new Tache($connexion, "Acheter des fournitures de bureau", "Acheter des stylos, des cahiers, etc.", "2024-04-30", "Haute", "En cours", 1);
   
            // Récupérer les tâches terminées
            $taches_terminees = $tache->afficherTachesTerminees($idUtilisateur);

            // Afficher les tâches terminées
            foreach ($taches_terminees as $tache) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $tache['libelle'] . "</h5>";
                echo "<p>";
                // Lien vers la page d'informations de la tâche
                echo "<a href='detailsache.php?id=" . $tache['id'] . "'><i class='fas fa-info-circle'></i></a> ";
                // Lien vers la page d'édition de la tâche
                echo "<a href='updateTache.php?id=" . $tache['id'] . "'><i class='fas fa-edit'></i></a> ";
                // Lien pour supprimer la tâche
                echo "<a href='deleteTache.php?id=" . $tache['id'] . "'><i class='fas fa-trash-alt'></i></a>";
                echo "</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

    </div>
</div>

<!-- Inclure Bootstrap JS (si nécessaire) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Inclure FontAwesome JS (si nécessaire) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<!-- JavaScript personnalisé pour Kanban -->
<script src="home.js"></script>

</body>
</html>
