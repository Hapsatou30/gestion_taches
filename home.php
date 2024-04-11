<?php
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
                <button class="btn btn-primary float-right">Créer une tâche</button>
            </div>
    </div>

    <div class="kanban">
        <div class="column" id="todo">
            <h2>À faire</h2>
            <?php
            // Inclure le fichier de configuration de la base de données
            require_once 'config.php';

            try {
                // Requête SQL pour sélectionner les tâches à faire de l'utilisateur actuel
                $sql = "SELECT * FROM Tache WHERE etat = 'à faire' AND id_utilisateur = ?";
                $stmt = $connexion->prepare($sql);
                $stmt->execute([$idUtilisateur]);
                $taches_todo = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Afficher les tâches à faire
                foreach ($taches_todo as $tache) {
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $tache['libelle'] . "</h5>";
                    echo "<p><i class='fas fa-info-circle'></i> <i class='fas fa-edit'></i>  <i class='fas fa-trash-alt'></i> </p>";
                    echo "</div>";
                    echo "</div>";
                }
            } catch (PDOException $e) {
                // En cas d'erreur, affichez le message d'erreur
                echo "Erreur lors de la récupération des tâches à faire : " . $e->getMessage();
            }
            ?>
        </div>
        <div class="column" id="inProgress">
            <h2>En cours</h2>
            <?php
            try {
                // Requête SQL pour sélectionner les tâches en cours de l'utilisateur actuel
                $sql = "SELECT * FROM Tache WHERE etat = 'en cours' AND id_utilisateur = ?";
                $stmt = $connexion->prepare($sql);
                $stmt->execute([$idUtilisateur]);
                $taches_inProgress = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Afficher les tâches en cours
                foreach ($taches_inProgress as $tache) {
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $tache['libelle'] . "</h5>";
                    echo "<p><i class='fas fa-info-circle'></i>  <i class='fas fa-edit'></i>  <i class='fas fa-trash-alt'></i> </p>";
                    echo "</div>";
                    echo "</div>";
                }
            } catch (PDOException $e) {
                // En cas d'erreur, affichez le message d'erreur
                echo "Erreur lors de la récupération des tâches en cours : " . $e->getMessage();
            }
            ?>
        </div>
        <div class="column" id="done">
            <h2>Terminé</h2>
            <?php
            try {
                // Requête SQL pour sélectionner les tâches terminées de l'utilisateur actuel
                $sql = "SELECT * FROM Tache WHERE etat = 'terminée' AND id_utilisateur = ?";
                $stmt = $connexion->prepare($sql);
                $stmt->execute([$idUtilisateur]);
                $taches_done = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Afficher les tâches terminées
                foreach ($taches_done as $tache) {
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $tache['libelle'] . "</h5>";
                    echo "<p><i class='fas fa-info-circle'></i> <i class='fas fa-edit'></i> <i class='fas fa-trash-alt'></i> </p>";
                    echo "</div>";
                    echo "</div>";
                }
            } catch (PDOException $e) {
                // En cas d'erreur, affichez le message d'erreur
                echo "Erreur lors de la récupération des tâches terminées : " . $e->getMessage();
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
