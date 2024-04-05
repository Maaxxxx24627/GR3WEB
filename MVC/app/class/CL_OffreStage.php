<?php

class CL_OffreStage {
    private $id_offreStage;
    private $titre;
    private $competences;
    private $typePromotion;
    private $duree;
    private $remuneration;
    private $date;
    private $nombrePlace;
    private $nombrePersonnePostule;
    private $topOffre;
    private $id_entreprise;
    private $id_utilisateur;

    public function __construct($id_offreStage, $titre, $competences, $typePromotion, $duree, $remuneration, $date, $nombrePlace, $nombrePersonnePostule, $topOffre, $id_entreprise, $id_utilisateur) {
        $this->id_offreStage = $id_offreStage;
        $this->titre = $titre;
        $this->competences = $competences;
        $this->typePromotion = $typePromotion;
        $this->duree = $duree;
        $this->remuneration = $remuneration;
        $this->date = $date;
        $this->nombrePlace = $nombrePlace;
        $this->nombrePersonnePostule = $nombrePersonnePostule;
        $this->topOffre = $topOffre;
        $this->id_entreprise = $id_entreprise;
        $this->id_utilisateur = $id_utilisateur;
    }

    // Getters et Setters...

    public function save() {
        // Logique pour sauvegarder l'objet dans la base de données...
    }
}

// Pour utiliser cette classe mise à jour :
$offreStage = new CL_OffreStage(1, "Développeur Web", "PHP, JavaScript", "2022", "6 mois", "500", "2022-07-15", 3, 0, false, 1, 10);
echo $offreStage->getTitre(); // Affiche "Développeur Web"
