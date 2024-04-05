<?php

class CL_Entreprise {
    private $id_entreprise;
    private $nom;
    private $nombreStage;
    private $secteurActivite;
    private $nombreVues;
    private $id_localisation;

    public function __construct($id_entreprise, $nom, $nombreStage, $secteurActivite, $nombreVues, $id_localisation) {
        $this->id_entreprise = $id_entreprise;
        $this->nom = $nom;
        $this->nombreStage = $nombreStage;
        $this->secteurActivite = $secteurActivite;
        $this->nombreVues = $nombreVues;
        $this->id_localisation = $id_localisation;
    }

    // Getters
    public function getIdEntreprise() {
        return $this->id_entreprise;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getNombreStage() {
        return $this->nombreStage;
    }

    public function getSecteurActivite() {
        return $this->secteurActivite;
    }

    public function getNombreVues() {
        return $this->nombreVues;
    }

    public function getIdLocalisation() {
        return $this->id_localisation;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setNombreStage($nombreStage) {
        $this->nombreStage = $nombreStage;
    }

    public function setSecteurActivite($secteurActivite) {
        $this->secteurActivite = $secteurActivite;
    }

    public function setNombreVues($nombreVues) {
        $this->nombreVues = $nombreVues;
    }

    public function setIdLocalisation($id_localisation) {
        $this->id_localisation = $id_localisation;
    }

    // Méthodes pour la logique métier (par exemple, enregistrer l'entreprise dans la base de données)
    public function save() {
        // Implémentez la logique pour sauvegarder l'objet dans la base de données
    }
}

// Pour utiliser cette classe :
$entreprise = new CL_Entreprise(1, "Tech Innov", 5, "Technologie", 150, 2);
echo $entreprise->getNom(); // Affiche "Tech Innov"
