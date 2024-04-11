<?php

require_once "Tache.php";
require_once "Utilisateur.php";

// Définition des constantes pour les informations de connexion à la base de données
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestion_taches');

try {
    // Connexion à la base de données en utilisant PDO
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Configuration de PDO pour afficher les erreurs de requête SQL
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user = new Utilisateur($connexion,"nom", "prenom", "motDePasse", "email");
    $tache = new Tache($connexion, "Acheter des fournitures de bureau", "Acheter des stylos, des cahiers, etc.", "2024-04-30", "Haute", "En cours", 1);
   
} catch(PDOException $e) {
    // Affichage d'un message d'erreur et arrêt du script si la connexion échoue
    die("ERREUR: Impossible de se connecter. " . $e->getMessage());
}
?>