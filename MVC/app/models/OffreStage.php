<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class OffreStageModel
{
    use Database; // Utilisation du trait Database
    private $db;
    private $offres;

    public function __construct() {
        $this->db = $this->connect(); // Utilise la méthode connect() du trait Database pour établir la connexion
        $this->offres = array();
    }

    public function fetchOffres() {
        $query = "SELECT OffreStage.*, Entreprise.Nom AS NomEntreprise, Localisation.Ville AS VilleLocalisation
                  FROM OffreStage 
                  JOIN Entreprise ON OffreStage.Id_Entreprise = Entreprise.Id_Entreprise
                  JOIN Localisation ON Entreprise.Id_Localisation = Localisation.Id_Localisation";
    
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        // Assignation des résultats à la propriété offres de l'objet
        $this->offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function fetchOffresFiltered($recherche) { // Afficher les offres après recherche
        $query = "SELECT OffreStage.*, Entreprise.Nom AS NomEntreprise, Localisation.Ville AS VilleLocalisation
          FROM OffreStage 
          JOIN Entreprise ON OffreStage.Id_Entreprise = Entreprise.Id_Entreprise
          JOIN Localisation ON Entreprise.Id_Localisation = Localisation.Id_Localisation
          WHERE OffreStage.Titre LIKE :recherche 
          OR Localisation.Ville LIKE :recherche";

        $stmt = $this->db->prepare($query);
        $stmt->execute(['recherche' => "%$recherche%"]);
        $this->offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function fetchOffresByDuree($duree) {
        // La requête de base avec les jointures appropriées
        $query = "SELECT OffreStage.*, Entreprise.Nom AS NomEntreprise, Localisation.Ville AS VilleLocalisation
                  FROM OffreStage
                  JOIN Entreprise ON OffreStage.Id_Entreprise = Entreprise.Id_Entreprise
                  JOIN Localisation ON Entreprise.Id_Localisation = Localisation.Id_Localisation";
        
        // Ajout d'une clause WHERE selon la durée spécifiée
        switch ($duree) {
            case '1':
                $query .= " WHERE OffreStage.Durée = '1'";
                break;
            case '4':
                $query .= " WHERE OffreStage.Durée = '4'";
                break;
            case '5-10':
                $query .= " WHERE OffreStage.Durée BETWEEN '5' AND '10'";
                break;
            case '10-15':
                $query .= " WHERE OffreStage.Durée BETWEEN '10' AND '15'";
                break;
            // Pas de default nécessaire car la requête de base récupère déjà toutes les offres
        }
    
        // Préparation et exécution de la requête
        $stmt = $this->db->prepare($query);
        $stmt->execute(); // Pas besoin de passer de paramètres ici
        $this->offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function fetchOffresByRemuneration($remuneration) {
        // La requête de base avec les jointures appropriées
        $query = "SELECT OffreStage.*, Entreprise.Nom AS NomEntreprise, Localisation.Ville AS VilleLocalisation
                  FROM OffreStage
                  JOIN Entreprise ON OffreStage.Id_Entreprise = Entreprise.Id_Entreprise
                  JOIN Localisation ON Entreprise.Id_Localisation = Localisation.Id_Localisation";
        
        // Ajout d'une clause WHERE selon la durée spécifiée
        switch ($remuneration) {
            case '0-5':
                $query .= " WHERE OffreStage.Rémunération BETWEEN '0' AND '5'";
                break;
            case '5-10':
                $query .= " WHERE OffreStage.Rémunération BETWEEN '5' AND '10'";
                break;
            case '10-15':
                $query .= " WHERE OffreStage.Rémunération BETWEEN '10' AND '15'";
                break;
            // Pas de default nécessaire car la requête de base récupère déjà toutes les offres
        }
    
        // Préparation et exécution de la requête
        $stmt = $this->db->prepare($query);
        $stmt->execute(); // Pas besoin de passer de paramètres ici
        $this->offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOffresByActivite($activite) {

        $query = "SELECT OffreStage.*, Entreprise.Nom AS NomEntreprise, Localisation.Ville AS VilleLocalisation
                  FROM OffreStage
                  JOIN Entreprise ON OffreStage.Id_Entreprise = Entreprise.Id_Entreprise
                  JOIN Localisation ON Entreprise.Id_Localisation = Localisation.Id_Localisation";
    
        switch ($activite) {
            case 'informatique':
                $query .= " WHERE Entreprise.SecteurActivité = 'Informatique'";
                break;
            case 'medecine':
                $query .= " WHERE Entreprise.SecteurActivité = 'Médecine'";
                break;
            case 'batiment':
                $query .= " WHERE Entreprise.SecteurActivité = 'Batiment'";
                break;
            // Pas besoin de default si vous souhaitez retourner toutes les offres lorsque aucun filtre n'est sélectionné
        }
    
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $this->offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function fetchOffresByNiveau($niveau) {

        $query = "SELECT OffreStage.*, Entreprise.Nom AS NomEntreprise, Localisation.Ville AS VilleLocalisation
                FROM OffreStage
                JOIN Entreprise ON OffreStage.Id_Entreprise = Entreprise.Id_Entreprise
                JOIN Localisation ON Entreprise.Id_Localisation = Localisation.Id_Localisation";    

        switch ($niveau) {
            case 'CPI A2':
                $query .= " WHERE OffreStage.TypePromotion = 'CPI A2'";
            break;
            case 'CPI A3':
                $query .= " WHERE OffreStage.TypePromotion = 'CPI A3'";
            break;
            case 'CPI A4':
                $query .= " WHERE OffreStage.TypePromotion = 'CPI A4'";
            break;
            case 'CPI A5':
                $query .= " WHERE OffreStage.TypePromotion = 'CPI A5'";
            break;
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $this->offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addOffre($offre)
    {
        $this->offres[] = $offre;
    }

    public function getOffre()
    {
        return $this->offres;
    }
}