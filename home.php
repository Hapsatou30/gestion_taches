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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Inclure FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- CSS personnalisé pour Kanban -->
    <link rel="stylesheet" href="home.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
    <?php 
    require_once "header.php";
    ?>
        
        <!-- Contenu principal -->
        <main class="col-md-9">
            <div class="row">
                <h1 class="titre col-md-9">Liste des Tâches</h1>
                <div class="bouton col-md-3">
                    <a class="btn float-right" href="ajoutTache.php" >Créer une tâche</a>
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
                echo "<p class='icon'>";
                // Lien vers la page d'informations de la tâche
                echo "<a href='detailsTache.php?id=" . $tache['id'] . "' title='Détails de la tâche'>";
                echo "<i class='fas fa-info-circle fa-2x'></i>";
                echo "</a>";

                // Lien vers la page d'édition de la tâche
                echo "<a href='updateTache.php?id=" . $tache['id'] . "' title='Modifier la tâche'>";
                echo "<i class='fas fa-edit fa-2x' style='color: #2ECC71;'></i>";
                echo "</a>";

                // Lien pour supprimer la tâche
                echo "<a href='deleteTache.php?id=" . $tache['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');\" title='Supprimer la tâche'>";
                echo "<i class='fas fa-trash-alt fa-2x' style='color: red;'></i>";
                echo "</a>";

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
                echo "<p class='icon'>";
               // Lien vers la page d'informations de la tâche
                echo "<a href='detailsTache.php?id=" . $tache['id'] . "' title='Détails de la tâche'>";
                echo "<i class='fas fa-info-circle fa-2x'></i>";
                echo "</a>";

                // Lien vers la page d'édition de la tâche
                echo "<a href='updateTache.php?id=" . $tache['id'] . "' title='Modifier la tâche'>";
                echo "<i class='fas fa-edit fa-2x' style='color: #2ECC71;'></i>";
                echo "</a>";

                // Lien pour supprimer la tâche
                echo "<a href='deleteTache.php?id=" . $tache['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');\" title='Supprimer la tâche'>";
                echo "<i class='fas fa-trash-alt fa-2x' style='color: red;'></i>";
                echo "</a>";

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
                echo "<p class='icon'>";
               // Lien vers la page d'informations de la tâche
                echo "<a href='detailsTache.php?id=" . $tache['id'] . "' title='Détails de la tâche'>";
                echo "<i class='fas fa-info-circle fa-2x'></i>";
                echo "</a>";

                // Lien vers la page d'édition de la tâche
                echo "<a href='updateTache.php?id=" . $tache['id'] . "' title='Modifier la tâche'>";
                echo "<i class='fas fa-edit fa-2x' style='color: #2ECC71;'></i>";
                echo "</a>";

                // Lien pour supprimer la tâche
                echo "<a href='deleteTache.php?id=" . $tache['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');\" title='Supprimer la tâche'>";
                echo "<i class='fas fa-trash-alt fa-2x' style='color: red;'></i>";
                echo "</a>";

                echo "</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

    </div>
        </main>
    </div>
</div>




</div>




</body>
</html>
