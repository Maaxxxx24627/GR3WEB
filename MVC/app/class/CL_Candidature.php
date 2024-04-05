<?php

class CL_Candidature {
    private $id_candidature;
    private $dateCandidature;
    private $lettreMotivation;
    private $statut;
    private $cv;
    private $id_utilisateur;
    private $id_offreStage;

    public function __construct($id_candidature, $dateCandidature, $lettreMotivation, $statut, $cv, $id_utilisateur, $id_offreStage) {
        $this->id_candidature = $id_candidature;
        $this->dateCandidature = $dateCandidature;
        $this->lettreMotivation = $lettreMotivation;
        $this->statut = $statut;
        $this->cv = $cv;
        $this->id_utilisateur = $id_utilisateur;
        $this->id_offreStage = $id_offreStage;
    }

    // Getters
    public function getIdCandidature() {
        return $this->id_candidature;
    }

    public function getDateCandidature() {
        return $this->dateCandidature;
    }

    public function getLettreMotivation() {
        return $this->lettreMotivation;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getCV() {
        return $this->cv;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function getIdOffreStage() {
        return $this->id_offreStage;
    }

    // Setters
    public function setDateCandidature($dateCandidature) {
        $this->dateCandidature = $dateCandidature;
    }

    public function setLettreMotivation($lettreMotivation) {
        $this->lettreMotivation = $lettreMotivation;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function setCV($cv) {
        $this->cv = $cv;
    }

    // Potentially more methods here for business logic, like saving the candidature to a database
    public function save() {
        // Implementation for saving the object to the database
    }
}

// Example of using the class
$candidature = new CL_Candidature(1, "2024-01-01", "Voici ma lettre de motivation.", "En attente", "path/to/cv.pdf", 123, 456);
echo $candidature->getLettreMotivation(); // Outputs: Voici ma lettre de motivation.
