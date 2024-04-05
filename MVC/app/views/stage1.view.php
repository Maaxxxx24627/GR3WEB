<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Internship Listing</title>
<link rel="stylesheet" href="https://assets.douvinaigrette.sbihel.fr/stage1.css">
<link rel="manifest" href="manifest">
</head>
<body>

<?php
// Inclusion du fichier contenant la classe OffreStageModel
require_once('/var/www/douvinaigrette/MVC/app/models/OffreStage.php');

// Création de l'objet de la classe OffreStageModel
$offreStageModel = new OffreStageModel();

// Récupération des offres de stage depuis la base de données
$offreStageModel->fetchOffres();

// Boucle pour afficher chaque offre
foreach ($offreStageModel->getOffre() as $offre) {
    ?>
    <div class="internship-container">
        <div class="internship-info">
            <h2><a href="stage1_0" class="wishlist-link"><?php echo isset($offre['Titre']) ? $offre['Titre'] : "Titre non défini"; ?></a></h2>
            <p><?php echo isset($offre['NomEntreprise']) ? $offre['NomEntreprise'] : "Nom de l'entreprise non défini"; ?></p>
            <p><?php echo isset($offre['Lieu']) ? $offre['Lieu'] : "Lieu non défini"; ?></p>
            <p><?php echo isset($offre['Competences']) ? $offre['Competences'] : "Compétences non définies"; ?></p>
            <!-- Ajoutez ici d'autres informations que vous souhaitez afficher -->
            <button type="button">Ajouter Wish-list</button>
        </div>
        <div class="internship-image">
            <img src="<?php echo isset($offre['Image']) ? $offre['Image'] : "Chemin de l'image non défini"; ?>" alt="Internship">
            <p>Date de publication : <?php echo isset($offre['Date']) ? $offre['Date'] : "Date non définie"; ?></p>
        </div>
    </div>
    <?php
}
?>


</body>
</html>
