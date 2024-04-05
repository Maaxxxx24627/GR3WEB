<?php

class CL_Utilisateur {
    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;
    private $dateNaissance;
    private $type;
    private $id_centreFormation;
    private $id_wishList;

    public function __construct($id_utilisateur, $nom, $prenom, $email, $motDePasse, $dateNaissance, $type, $id_centreFormation, $id_wishList) {
        $this->id_utilisateur = $id_utilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->dateNaissance = $dateNaissance;
        $this->type = $type;
        $this->id_centreFormation = $id_centreFormation;
        $this->id_wishList = $id_wishList;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function getNom() {
        return $this->nom;
    }

    // Continuer avec les autres getters et setters comme dans l'exemple original

    public function save() {
        // Implémentation de la sauvegarde de l'objet dans la base de données
    }
}


$utilisateur = new CL_Utilisateur(1, "Doe", "John", "johndoe@example.com", "hashed_password", "1990-01-01", "Étudiant", 2, 10);
echo $utilisateur->getNom(); // Affiche "Doe"
