<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class ADD {
    use Database;

    public function addData($data) {      
        $query = "INSERT INTO OffreStage (Titre, Competences, TypePromotion, Durée, Rémunération, Date, Id_Entreprise, Id_Utilisateur, NombrePlaces) VALUES (:titre, :competences, :typePromotion, :duree, :remuneration, :date, :id_Entreprise, :id_Utilisateur, :NombrePlaces)";
        
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



    $formData = [
        ':titre' => $_POST['titre'],
        ':competences' => $_POST['competences'],
        ':typePromotion' => $_POST['typePromotion'],
        ':duree' => $_POST['duree'],
        ':remuneration' => $_POST['remuneration'],
        ':date' => $_POST['date'], 
        ':id_Entreprise' => $_POST['id_Entreprise'],
        ':id_Utilisateur' => $_POST['id_Utilisateur'],
        ':NombrePlaces' => $_POST['NombrePlaces']
    ];

    $ADD = new ADD();
    $ADD->addData($formData);
}


