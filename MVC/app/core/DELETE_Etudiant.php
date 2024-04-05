<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class DELETE {
    use Database;

    public function deleteData($id) {
        $id = (int)$id;
        $query = "DELETE FROM Eleve WHERE Id_Eleve = :id";
        
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

    
    if ($_POST['Id_Eleve'] !== '' && !ctype_digit($_POST['Id_Eleve'])) {
        die('L\'ID du pilote doit être un nombre.');
    }

    $champsTextuels = ['nom', 'prenom','centre', 'promotion'];
    foreach ($champsTextuels as $champ) {
        if ($_POST[$champ] !== '' && !preg_match("/^[A-Za-z\s]+$/", $_POST[$champ])) {
            die("Le champ $champ doit contenir uniquement des lettres.");
        }
    }

    $DELETE = new DELETE();
    $DELETE->deleteData($idToDelete);

}




