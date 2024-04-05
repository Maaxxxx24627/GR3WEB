q<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class ADD {
    use Database;

    public function addData($data) {
   
        $query = "INSERT INTO Pilote (Nom, Prénom, Centre, Promotion) VALUES (:nom, :prenom, :centre, :promotion)";

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

    

    if ($_POST['Id_Pilote'] !== '' && !ctype_digit($_POST['Id_Pilote'])) {
        die('L\'ID du pilote doit être un nombre.');
    }

    $champsTextuels = ['nom', 'prenom','centre', 'promotion'];
    foreach ($champsTextuels as $champ) {
        if ($_POST[$champ] !== '' && !preg_match("/^[A-Za-z\s]+$/", $_POST[$champ])) {
            die("Le champ $champ doit contenir uniquement des lettres.");
        }
    }



    $formData = [
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':centre' => $_POST['centre'],
        ':promotion' => $_POST['promotion'],
    ];

    $pilote = new ADD();
    $pilote->addData($formData);
}


?>
