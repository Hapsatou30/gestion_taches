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
   echo"reussie";
   $user = new Utilisateur($connexion,"nom", "prenom", "motDePasse", "email");
    // Configuration de PDO pour afficher les erreurs de requête SQL
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch(PDOException $e) {
    // Affichage d'un message d'erreur et arrêt du script si la connexion échoue
    die("ERREUR: Impossible de se connecter. " . $e->getMessage());
}
?>