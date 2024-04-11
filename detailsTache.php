<?php
// Inclure votre classe Tache et établir la connexion à la base de données
require_once 'config.php';



try {
    // Récupérer l'ID de la tâche à afficher
    $taskId = $_GET['id'];

    // Récupérer les détails de la tâche spécifique
    $tacheDetails = $tache->TacheParId($taskId);

    // Afficher les détails de la tâche
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>" . $tacheDetails['libelle'] . "</h5>";
    echo "<p class='card-text'>" . $tacheDetails['description'] . "</p>";
    echo "<p class='card-text'>Date d'échéance : " . $tacheDetails['date_echeance'] . "</p>";
    echo "<p class='card-text'>Priorité : " . $tacheDetails['priorite'] . "</p>";
    echo "<p class='card-text'>État : " . $tacheDetails['etat'] . "</p>";
    echo "</div>";
    echo "</div>";
} catch (Exception $e) {
    echo "Une erreur s'est produite lors de la récupération des détails de la tâche : " . $e->getMessage();
}
?>
