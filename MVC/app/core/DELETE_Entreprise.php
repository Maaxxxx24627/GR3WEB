<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class DELETE_Entreprise {
    use Database;

    public function deleteData_Entreprise($id) {
        $id = (int)$id;
        $query = "DELETE FROM Entreprise WHERE Id_Entreprise = :id";
        
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
    
    $DELETE_Entreprise = new DELETE_Entreprise();
    $DELETE_Entreprise->deleteData_Entreprise($idToDelete);

}
?>
