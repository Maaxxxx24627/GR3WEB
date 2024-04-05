<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class WishList {
    use Database;

    public function addToWishList($offreStageId) {
        $query = "INSERT INTO WishList (Id_OffreStage) VALUES (:offreStageId)";

        try {
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':offreStageId', $offreStageId, PDO::PARAM_INT);
            $stmt->execute();
            echo "Offre ajoutée à la Wish-List avec succès.";
        } catch (PDOException $e) {
            die("Erreur lors de l'ajout à la Wish-List : " . $e->getMessage());
        }
    }
}

if (isset($_POST['ajouter'])) {

  

    $offreStageId = $_POST['Id_OffreStage'];
    $wishList = new WishList();
    $wishList->addToWishList($offreStageId);
 
}
?>
