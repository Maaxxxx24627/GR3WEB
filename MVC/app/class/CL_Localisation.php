<?php

class CL_Localisation {
    private $id_localisation;
    private $adresse;
    private $ville;
    private $codePostal;
    private $pays;

    public function __construct($id_localisation, $adresse, $ville, $codePostal, $pays) {
        $this->id_localisation = $id_localisation;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->codePostal = $codePostal;
        $this->pays = $pays;
    }

    // Getters
    public function getIdLocalisation() {
        return $this->id_localisation;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function getPays() {
        return $this->pays;
    }

    // Setters
    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }

    // Méthodes pour la logique métier si nécessaire
    // Par exemple, enregistrer la localisation dans la base de données
    public function save() {
        // Implémentez la logique pour sauvegarder l'objet dans la base de données
    }
}

// Pour utiliser cette classe :
$localisation = new CL_Localisation(1, "123 Rue Exemple", "ExempleVille", "12345", "ExemplePays");
echo $localisation->getAdresse(); // Affiche "123 Rue Exemple"
