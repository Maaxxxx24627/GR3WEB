<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class ADD_Entreprise {
    use Database;

    public function addData_Entreprise($data) {      
        $query = "INSERT INTO Entreprise (Nom, SecteurActivité, Id_Localisation) VALUES (:nom, :secteurActivite, :Id_Localisation)";
        
        try {
            $stmt = $this->connect()->prepare($query);
            $stmt->execute($data);
            echo "Données ajoutées avec succès.";
        } catch (PDOException $e) {
            die("Erreur lors de l'ajout des données : " . $e->getMessage());           
        }
    }
}

if (isset($_POST['ajouter'])) {

    if ($_POST['Id_Entreprise'] !== '' && !ctype_digit($_POST['Id_Entreprise'])) {
        die('L\'ID Entreprise doit être un nombre.');
    }
    
    if ($_POST['Id_Localisation'] !== '' && !ctype_digit($_POST['Id_Localisation'])) {
        die('L\'ID Localisation doit être un nombre.');
    }

    if ($_POST['nom'] !== '' && !preg_match("/^[A-Za-z\s]*$/", $_POST['nom'])) {
        die('Le nom doit contenir uniquement des lettres ou être laissé vide.');
    }

    if ($_POST['secteurActivite'] !== '' && !preg_match("/^[A-Za-z\s]*$/", $_POST['secteurActivite'])) {
        die('Le secteur d\'activité doit contenir uniquement des lettres ou être laissé vide.');
    }
    

    
 
    $formData = [
        ':nom' => $_POST['nom'],
        ':secteurActivite' => $_POST['secteurActivite'],
        ':Id_Localisation' => $_POST['Id_Localisation']
    ];
    $add_entreprise = new ADD_Entreprise();

    $add_entreprise->addData_Entreprise($formData);
}

?>
