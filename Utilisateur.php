<?php

class Utilisateur {
    // Attributs
    private $connexion;
    private $nom;
    private $prenom;
    private $motDePasse;
    private $email;

    // Constructeur
    public function __construct($connexion,$nom, $prenom, $motDePasse, $email) {
        $this->connexion=$connexion;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->motDePasse = $motDePasse;
        $this->email = $email;
    }

    
    // Getters et Setters
   
    // Getters

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getMotDePasse() {
        return $this->motDePasse;
    }

    public function getEmail() {
        return $this->email;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function modifierMotDePasse($nouveauMotDePasse) {
        $this->motDePasse = $nouveauMotDePasse;
        
    }

    public function modifierEmail($nouvelEmail) {
        $this->email = $nouvelEmail;
       
    }

    
    
    
}

?>
