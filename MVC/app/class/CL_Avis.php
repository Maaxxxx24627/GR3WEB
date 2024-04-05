<?php

class CL_Avis {
    private $id_avis;
    private $score;
    private $commentaire;
    private $date;
    private $id_utilisateur;
    private $id_entreprise;

    public function __construct($id_avis, $score, $commentaire, $date, $id_utilisateur, $id_entreprise) {
        $this->id_avis = $id_avis;
        $this->score = $score;
        $this->commentaire = $commentaire;
        $this->date = $date;
        $this->id_utilisateur = $id_utilisateur;
        $this->id_entreprise = $id_entreprise;
    }

    // Getters
    public function getIdAvis() {
        return $this->id_avis;
    }

    public function getScore() {
        return $this->score;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function getDate() {
        return $this->date;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function getIdEntreprise() {
        return $this->id_entreprise;
    }

    // Setters
    public function setScore($score) {
        $this->score = $score;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    // Vous pouvez ajouter des méthodes spécifiques pour la logique métier ici
    // Par exemple, enregistrer l'avis dans la base de données
    public function save() {
        // Implémentez la logique pour sauvegarder l'objet dans la base de données
    }
}

// Pour utiliser cette classe :
$avis = new CL_Avis(1, 5, "Très satisfait du stage.", "2023-03-18", 10, 2);
echo $avis->getCommentaire(); // Affiche "Très satisfait du stage."
