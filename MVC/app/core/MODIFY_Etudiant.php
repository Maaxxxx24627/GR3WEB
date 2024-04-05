<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');


class ModifyData {
    use Database;

    public function getOfferById($id) {
        $query = "SELECT * FROM Eleve WHERE Id_Eleve = :id";
        try {           
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([':id' => $id]);
            $result = $stmt->fetch();

            if ($result) {
                return $result;
            } else {
                echo "Aucune offre trouvée avec cet ID.";
                return false;
            }
        } catch (PDOException $e) {
            die("Erreur lors de la récupération de l'offre : " . $e->getMessage());
        }
    }

    public function updateOffer($data) {
        try {
            $query = "UPDATE Eleve SET Nom = :nom, Prénom = :prenom, Promotion = :promotion, Centre = :centre WHERE Id_Eleve = :Id_Eleve";
            $stmt = $this->connect()->prepare($query);
            $result = $stmt->execute($data);

            if ($result) {
                echo "Ligne modifiée avec succès.";
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die("Erreur lors de la mise à jour des données : " . $e->getMessage());
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    if ($_POST['Id_Eleve'] !== '' && !ctype_digit($_POST['Id_Eleve'])) {
        die('L\'ID du pilote doit être un nombre.');
    }

    $champsTextuels = ['nom', 'prenom','centre', 'promotion'];
    foreach ($champsTextuels as $champ) {
        if ($_POST[$champ] !== '' && !preg_match("/^[A-Za-z\s]+$/", $_POST[$champ])) {
            die("Le champ $champ doit contenir uniquement des lettres.");
        }
    }

    $ModifyData = new ModifyData();
    
    $updatedata = [
        'Id_Eleve' => $_POST['Id_Eleve'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'promotion' => $_POST['promotion'],
        'centre' => $_POST['centre'],
    ];
    
    
    

    $ModifyData->updateOffer($updatedata);
    
}

