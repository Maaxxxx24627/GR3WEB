<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wish-list</title>
<link rel="stylesheet" href="https://assets.douvinaigrette.sbihel.fr/wishlist.css">
<link rel="manifest" href="manifest">
</head>
<body>
<h1>Wishlist</h1>
    <div>
    <?php
if(isset($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) {
    foreach($_SESSION['wishlist'] as $offre) {
        echo "<div>";
        echo "<h2>" . htmlspecialchars($offre['offreTitre']) . "</h2>";
        // Affichez toutes les autres informations de l'offre de stage
        echo "<p>Nom de l'entreprise: " . htmlspecialchars($offre['nomEntreprise']) . "</p>";
        echo "<p>Ville: " . htmlspecialchars($offre['ville']) . "</p>";
        // Affichez les autres informations nécessaires
        echo "</div>";
    }
} else {
    echo "<p>Aucun élément dans la wishlist.</p>";
}
?>

    </div>
    <a href="index.php">Retour à l'accueil</a>

</body>
</html>
