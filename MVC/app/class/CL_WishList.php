<?php

class CL_WishList {
    private $Id_WishList;  // Identifiant unique pour la liste de souhaits
    private $Type;         // Type de la liste de souhaits
    private $Id_OffreStage; // Identifiant de l'offre de stage

    // Constructeur
    public function __construct($Id_WishList, $Type, $Id_OffreStage) {
        $this->Id_WishList = $Id_WishList;
        $this->Type = $Type;
        $this->Id_OffreStage = $Id_OffreStage;
    }

    // Getters
    public function getIdWishList() {
        return $this->Id_WishList;
    }

    public function getType() {
        return $this->Type;
    }

    public function getIdOffreStage() {
        return $this->Id_OffreStage;
    }

    // Setters
    public function setIdWishList($Id_WishList) {
        $this->Id_WishList = $Id_WishList;
    }

    public function setType($Type) {
        $this->Type = $Type;
    }

    public function setIdOffreStage($Id_OffreStage) {
        $this->Id_OffreStage = $Id_OffreStage;
    }
}

// Exemple d'utilisation
$wishList = new CL_WishList(1, "Stage été", 101);
echo "ID Wishlist: " . $wishList->getIdWishList() . "\n";
echo "Type: " . $wishList->getType() . "\n";
echo "ID Offre de Stage: " . $wishList->getIdOffreStage() . "\n";
