<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');


class ModifyData {
    use Database;

    public function getOfferById($id) {
        $query = "SELECT * FROM OffreStage WHERE Id_Offre_Stage = :id";
        try {           
            $result = $this->get_row($query, ['id' => $id]);
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

    public function updateOffer($data) {
        try {
            $query = "UPDATE OffreStage SET Titre = :titre, Competences = :competences, TypePromotion = :typePromotion, `Durée` = :duree, `Rémunération` = :remuneration, Date = :date, Id_Entreprise = :id_Entreprise, Id_Utilisateur = :id_Utilisateur, NombrePlaces = :NombrePlaces WHERE Id_OffreStage = :Id_Offre_Stage";

            $stmt = $this->connect()->prepare($query);
            $result = $stmt->execute($data);
    
           
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

   
    $champsNumeriques = ['Id_Offre_Stage', 'duree', 'remuneration', 'id_Entreprise', 'id_Utilisateur', 'NombrePlaces'];
    foreach ($champsNumeriques as $champ) {
        if ($_POST[$champ] !== '' && !ctype_digit($_POST[$champ])) {
            die("Le champ $champ doit être un nombre.");
        }
    }

 
    $champsTextuels = ['titre', 'competences', 'typePromotion'];
    foreach ($champsTextuels as $champ) {
        if ($_POST[$champ] !== '' && !preg_match("/^[A-Za-z\s]*$/", $_POST[$champ])) {
            die("Le champ $champ doit contenir uniquement des lettres ou être laissé vide.");
        }
    }
   
    
    $updatedata = [
        ':Id_Offre_Stage' => $_POST['Id_Offre_Stage'],
        ':titre' => $_POST['titre'],
        ':competences' => $_POST['competences'],
        ':typePromotion' => $_POST['typePromotion'],
        ':duree' => $_POST['duree'],
        ':remuneration' => $_POST['remuneration'],
        ':date' => $_POST['date'],
        ':id_Entreprise' => $_POST['id_Entreprise'],
        ':id_Utilisateur' => $_POST['id_Utilisateur'],
        ':NombrePlaces' => $_POST['NombrePlaces'],
    ];
    
    
    $ModifyData = new ModifyData();
    $ModifyData->updateOffer($updatedata);
    
}

