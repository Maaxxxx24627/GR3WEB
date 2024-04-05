<?php
session_start();

if(isset($_POST['offreId']) && isset($_POST['offreTitre'])) {
    $_SESSION['wishlist'][] = array(
        'offreId' => $_POST['offreId'],
        'offreTitre' => $_POST['offreTitre'],
        // Récupérez d'autres informations de l'offre de stage
        'nomEntreprise' => $_POST['nomEntreprise'],
        'ville' => $_POST['ville'],
        // Récupérez les autres informations nécessaires
    );
}

?>
