<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class ADD {
    use Database;

    public function addData($data) {      
        $query = "INSERT INTO Eleve (Nom, Prénom, Centre, Promotion) VALUES (:nom, :prenom, :centre, :promotion)";
        
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

    
    if ($_POST['Id_Eleve'] !== '' && !ctype_digit($_POST['Id_Eleve'])) {
        die('L\'ID de ID_Eleve doit être un nombre.');
    }

    $champsTextuels = ['nom', 'prenom','centre', 'promotion'];
    foreach ($champsTextuels as $champ) {
        if ($_POST[$champ] !== '' && !preg_match("/^[A-Za-z\s]+$/", $_POST[$champ])) {
            die("Le champ $champ doit contenir uniquement des lettres.");
        }
    }

  
    $add = new ADD();
    $formData = [
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':centre' => $_POST['centre'],
        ':promotion' => $_POST['promotion']

    ];
    $add->addData($formData);
}

?>
