<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');


class ModifyData {
    use Database;

    public function getOfferById($id) {
        $query = "SELECT * FROM Pilote WHERE Id_Pilote = :id";
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
            $query = "UPDATE Pilote SET Nom = :nom, Prénom = :prenom, Promotion = :promotion, Centre = :centre WHERE Id_Pilote = :Id_Pilote";


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

    if ($_POST['Id_Pilote'] !== '' && !ctype_digit($_POST['Id_Pilote'])) {
        die('L\'ID du pilote doit être un nombre.');
    }

    $champsTextuels = ['nom', 'prenom','centre', 'promotion'];
    foreach ($champsTextuels as $champ) {
        if ($_POST[$champ] !== '' && !preg_match("/^[A-Za-z\s]+$/", $_POST[$champ])) {
            die("Le champ $champ doit contenir uniquement des lettres.");
        }
    }
    
    
    $updatedata = [
        'Id_Pilote' => $_POST['Id_Pilote'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'promotion' => $_POST['promotion'],
        'centre' => $_POST['centre'],
    ];
    
    $ModifyData = new ModifyData();
    $ModifyData->updateOffer($updatedata);
    
}

