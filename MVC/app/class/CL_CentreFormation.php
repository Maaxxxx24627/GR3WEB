<?php

class CL_CentreFormation {
    private $id_centreFormation;
    private $nomCentre;
    private $adresseCentre;

    public function __construct($id_centreFormation, $nomCentre, $adresseCentre) {
        $this->id_centreFormation = $id_centreFormation;
        $this->nomCentre = $nomCentre;
        $this->adresseCentre = $adresseCentre;
    }

    // Getters
    public function getIdCentreFormation() {
        return $this->id_centreFormation;
    }

    public function getNomCentre() {
        return $this->nomCentre;
    }

    public function getAdresseCentre() {
        return $this->adresseCentre;
    }

    // Setters
    public function setNomCentre($nomCentre) {
        $this->nomCentre = $nomCentre;
    }

    public function setAdresseCentre($adresseCentre) {
        $this->adresseCentre = $adresseCentre;
    }

    // Méthodes spécifiques à la logique métier si nécessaire
    // Par exemple, enregistrer le centre de formation dans la base de données
    public function save() {
        // Implémentez la logique pour sauvegarder l'objet dans la base de données
    }
}

// Pour utiliser cette classe :
$centreFormation = new CL_CentreFormation(1, "Centre de Formation XYZ", "123 Rue de l'Exemple, Ville");
echo $centreFormation->getNomCentre(); // Affiche "Centre de Formation XYZ"
