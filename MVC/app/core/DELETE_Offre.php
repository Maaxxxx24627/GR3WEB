<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class DELETE {
    use Database;

    public function deleteData($id) {
        $id = (int)$id;
        $query = "DELETE FROM OffreStage WHERE Id_OffreStage = :id";
        
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $stm->bindParam(':id', $id, PDO::PARAM_INT);
            $stm->execute();

            if ($stm->rowCount() > 0) {
                echo "Ligne supprimée avec succès.<br>";
            } else {
                echo "Aucune ligne trouvée avec cet ID, ou aucune ligne à supprimer.<br>";
            }
        } catch (PDOException $e) {
            die("Erreur lors de la suppression de la ligne : " . $e->getMessage());
        }
    }
}




if (isset($idToDelete)) {

   
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


    $DELETE = new DELETE();
    $DELETE->deleteData($idToDelete);

}




