<?php

class Tache {
    // Attributs
    private $connexion;
    private $libelle;
    private $description;
    private $dateEcheance;
    private $priorite; 
    private $etat; 
    private $idUtilisateur;

    // Constructeur
    public function __construct($connexion, $libelle, $description, $dateEcheance, $priorite, $etat, $idUtilisateur) {
        $this->connexion=$connexion;
        $this->libelle = $libelle;
        $this->description = $description;
        $this->dateEcheance = $dateEcheance;
        $this->priorite = $priorite;
        $this->etat = $etat;
        $this->idUtilisateur = $idUtilisateur;
    }

    // Méthodes

    // Getters
   
    public function getLibelle() {
        return $this->libelle;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDateEcheance() {
        return $this->dateEcheance;
    }

    public function getPriorite() {
        return $this->priorite;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    // Setters
    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDateEcheance($dateEcheance) {
        $this->dateEcheance = $dateEcheance;
    }

    public function setPriorite($priorite) {
        $this->priorite = $priorite;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    //methode pour créer une tache 
    public function creerTache($libelle, $description, $dateEcheance, $priorite,$etat, $idUtilisateur) {
        try {
            // Requête SQL pour insérer une nouvelle tâche dans la base de données
            $sql = "INSERT INTO Tache (libelle, description, date_echeance, priorite,etat, id_utilisateur) VALUES (?, ?, ?, ?, ?,?)";
            
            // Préparation de la requête
            $stmt = $this->connexion->prepare($sql);
    
            // Liaison des paramètres
            $stmt->bindParam(1, $libelle);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $dateEcheance);
            $stmt->bindParam(4, $priorite);
            $stmt->bindParam(5, $etat);
            $stmt->bindParam(6, $idUtilisateur);
    
            // Exécution de la requête
            $stmt->execute();
    
        } catch (PDOException $e) {
            // En cas d'erreur, affiche le message d'erreur
            echo "Erreur lors de la création de la tâche : " . $e->getMessage();
            return false;
        }
    }

    //la liste des taches
    // public function afficherListeTaches($idUtilisateur) {
    //     try {
    //         // Requête SQL pour sélectionner les tâches d'un utilisateur donné
    //         $sql = "SELECT * FROM Tache WHERE id_utilisateur = ?";
            
    //         // Préparation de la requête
    //         $stmt = $this->connexion->prepare($sql);
    
    //         // Liaison du paramètre
    //         $stmt->bindParam(1, $idUtilisateur);
    
    //         // Exécution de la requête
    //         $stmt->execute();
    
    //         // Récupération des résultats dans un tableau associatif
    //         $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //         // Retourne le tableau de résultats
    //         return $resultats;
    //     } catch (PDOException $e) {
    //         // En cas d'erreur, affiche le message d'erreur
    //         echo "Erreur lors de l'affichage de la liste des tâches : " . $e->getMessage();
            
    //     }
    // }
    

    // //liste des taches en cours
    // public function afficherTachesEnCours($idUtilisateur) {
    //     try {
    //         // Requête SQL pour sélectionner les tâches en cours d'un utilisateur donné
    //         $sql = "SELECT * FROM Tache WHERE id_utilisateur = ? AND etat = 'en cours'";
            
    //         // Préparation de la requête
    //         $stmt = $this->connexion->prepare($sql);
    
    //         // Liaison du paramètre
    //         $stmt->bindParam(1, $idUtilisateur);
    
    //         // Exécution de la requête
    //         $stmt->execute();
    
    //         // Récupération des résultats dans un tableau associatif
    //         $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    //         // Retourne le tableau de résultats
    //         return $resultats;
    //     } catch (PDOException $e) {
    //         // En cas d'erreur, affiche le message d'erreur
    //         echo "Erreur lors de l'affichage des tâches en cours : " . $e->getMessage();
            
    //     }
    // }

    // //liste des taches à faire

    // public function afficherTachesEnAttente($idUtilisateur) {
    //     try {
    //         // Requête SQL pour sélectionner les tâches en attente d'un utilisateur donné
    //         $sql = "SELECT * FROM Tache WHERE id_utilisateur = ? AND etat = 'à faire'";
            
    //         // Préparation de la requête
    //         $stmt = $this->connexion->prepare($sql);
    
    //         // Liaison du paramètre
    //         $stmt->bindParam(1, $idUtilisateur);
    
    //         // Exécution de la requête
    //         $stmt->execute();
    
    //         // Récupération des résultats dans un tableau associatif
    //         $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //         // Retourne le tableau de résultats
    //         return $resultats;
    //     } catch (PDOException $e) {
    //         // En cas d'erreur, affiche le message d'erreur
    //         echo "Erreur lors de l'affichage des tâches en attente : " . $e->getMessage();
            
    //     }
    // }
    
    // //liste des taches terminées

    // public function afficherTachesTerminees($idUtilisateur) {
    //     try {
    //         // Requête SQL pour sélectionner les tâches terminées d'un utilisateur donné
    //         $sql = "SELECT * FROM Tache WHERE id_utilisateur = ? AND etat = 'terminée'";
            
    //         // Préparation de la requête
    //         $stmt = $this->connexion->prepare($sql);
    
    //         // Liaison du paramètre
    //         $stmt->bindParam(1, $idUtilisateur);
    
    //         // Exécution de la requête
    //         $stmt->execute();
    
    //         // Récupération des résultats dans un tableau associatif
    //         $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         // Retourne le tableau de résultats
    //         return $resultats;
    //     } catch (PDOException $e) {
    //         // En cas d'erreur, affiche le message d'erreur
    //         echo "Erreur lors de l'affichage des tâches terminées : " . $e->getMessage();
            
    //     }
    // }
    
    //methode pour modifier l'etat d'une tache
    public function modifierEtatTache($idTache, $nouvelEtat) {
        try {
            // Requête SQL pour mettre à jour l'état d'une tâche
            $sql = "UPDATE Tache SET etat = ? WHERE id = ?";
            
            // Préparation de la requête
            $stmt = $this->connexion->prepare($sql);
    
            // Liaison des paramètres
            $stmt->bindParam(1, $nouvelEtat);
            $stmt->bindParam(2, $idTache);
    
            // Exécution de la requête
            $stmt->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, affiche le message d'erreur
            echo "Erreur lors de la modification de l'état de la tâche : " . $e->getMessage();
            
        }
    }

    //supprimer une tache

    public function supprimerTache($idTache) {
        try {
            // Requête SQL pour supprimer une tâche
            $sql = "DELETE FROM Tache WHERE id = ?";
            
            // Préparation de la requête
            $stmt = $this->connexion->prepare($sql);
    
            // Liaison du paramètre
            $stmt->bindParam(1, $idTache);
    
            // Exécution de la requête
            $stmt->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, affiche le message d'erreur
            echo "Erreur lors de la suppression de la tâche : " . $e->getMessage();
        }
    }
    
    
}

?>
