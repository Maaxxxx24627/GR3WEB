<?php
require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');


class ModifyData_Entreprise {
    use Database;

    public function getOfferById($id) {
        $query = "SELECT * FROM Entreprise WHERE Id_Entreprise = :id";
        try {           

             $stmt = $this->connect()->prepare($query);
            $result = $stmt->execute($data);


            if ($result) {
                
                return $result;
                
            } else {
                echo "Aucune offre trouvée avec cet ID.";
             
                return false;
            }
        } catch (PDOException $e) {
                die("Erreur lors de la suppression de la ligne : " . $e->getMessage());
        }
    }

    public function updateOffer_Entreprise($data) {
        try {
            $query = "UPDATE Entreprise SET Nom = :nom, SecteurActivité = :secteurActivite, Id_Localisation = :Id_Localisation WHERE Id_Entreprise = :Id_Entreprise";

            $result = $this->query($query, $data);
    
        
            if ($result === false) {
            
                return false;
            } else {
                echo("Ligne Modifiée avec Succès."); 
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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


  
   
    
    $updatedata_Entreprise = [
        ':Id_Entreprise' => $_POST['Id_Entreprise'], 
        ':nom' => $_POST['nom'],
        ':secteurActivite' => $_POST['secteurActivite'],
        ':Id_Localisation' => $_POST['Id_Localisation']
    ];
    
    
    $ModifyData_Entreprise = new ModifyData_Entreprise();
    $ModifyData_Entreprise->updateOffer_Entreprise($updatedata_Entreprise);
    
}



