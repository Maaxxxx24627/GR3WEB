<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="btn_gestion_entreprise.css">
<head>
    <meta charset="UTF-8">
    <title>Gestion Entreprises</title>
    <link rel="stylesheet" href="https://assets.douvinaigrette.sbihel.fr/btn_gestion_entreprise.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
</head>
<body>
    <div class="container">
    <a href="gestion" class="site-button gestion-link">Retour</a>
        <h1>Gestion des Entreprises</h1>
        <form id="formEntreprise" method="post">

        <div id="search-bar">
            <form method="GET">
                <input type="search" name="entreprise" placeholder="Rechercher par entreprise">
                <input type="submit" value="Rechercher">
            </form>
        </div>

    <div class="form-group">
        <label for="Id_Entreprise">Id_Entreprise :</label>
        <input type="text" id="Id_Entreprise" name="Id_Entreprise" pattern="\d*" title="L'ID doit être un nombre.">
    </div>
    
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" pattern="[A-Za-z\s]+" title="Le nom doit contenir uniquement des lettres.">
    </div>
    <div class="form-group">
        <label for="secteurActivite">Secteur d'activité :</label>
        <input type="text" id="secteurActivite" name="secteurActivite" pattern="[A-Za-z\s]+" title="Le secteur d'activité doit contenir uniquement des lettres.">
    </div>
    <div class="form-group">
        <label for="Id_Localisation">Id_Localisation :</label>
        <input type="text" id="Id_Localisation" name="Id_Localisation" pattern="\d*" title="L'ID de localisation doit être un nombre.">
    </div>
    <div class="button-group">
        <button type="submit" class="btn" id="ajouter" name="ajouter">Ajouter</button>
        <button type="submit" class="btn" id="modifier" name="modifier">Modifier</button>
        <button type="submit" class="btn" id ="supprimer" name="supprimer">Supprimer</button>
    </div>

    </div>

    <?php
// Include the entreprise model
require_once('/var/www/douvinaigrette/MVC/app/models/Entreprise.php');

// Instantiate the model
$entrepriseModel = new EntrepriseModel();

// Check if the search form has been submitted
if (isset($_GET['entreprise']) && !empty(trim($_GET['entreprise']))) {
    $nom = htmlspecialchars($_GET['entreprise']);
    $entrepriseModel->fetchEntrepriseByName($nom);

    $entreprises = $entrepriseModel->getEntreprises();

    // Display the search results
    if (!empty($entreprises)) {
        foreach ($entreprises as $entreprise) {
            // Output company details here...
            echo '<div class="entreprise-container">';
            echo '<h2>' . htmlspecialchars($entreprise['Nom'], ENT_QUOTES, 'UTF-8') . '</h2>';
            // Add other company details you want to display here...
            echo '</div>';
        }
    } else {
        echo '<p>Aucune entreprise trouvée pour: ' . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . '</p>';
    }
}
?>




    <script>
    document.getElementById('formEntreprise').addEventListener('submit', function(event) {
    var idEntreprise = document.getElementById('Id_Entreprise').value;
    var idLocalisation = document.getElementById('Id_Localisation').value;
    var nom = document.getElementById('nom').value;
    var secteurActivite = document.getElementById('secteurActivite').value;

    if (!(idEntreprise === "" || /^\d*$/.test(idEntreprise)) || !(idLocalisation === "" || /^\d*$/.test(idLocalisation))) {
        alert('Les IDs doivent être des nombres ou être laissés vides.');
        event.preventDefault();
    }

    if (!(nom === "" || /^[A-Za-z\s]*$/.test(nom)) || !(secteurActivite === "" || /^[A-Za-z\s]*$/.test(secteurActivite))) {
        alert('Le nom et le secteur d\'activité doivent contenir uniquement des lettres ou être laissés vides.');
        event.preventDefault();
    }
});
</script>


    
</body>
</html>

<?php



if (isset($_POST['ajouter'])) {
    require '/var/www/douvinaigrette/MVC/app/core/ADD_Entreprise.php';
}

if (isset($_POST['supprimer'])) {
    $idToDelete = $_POST['Id_Entreprise'];
    require '/var/www/douvinaigrette/MVC/app/core/DELETE_Entreprise.php';
}

if (isset($_POST['modifier'])) {
    $idToModify = $_POST['Id_Entreprise'];
    require '/var/www/douvinaigrette/MVC/app/core/MODIFY_Entreprise.php';
}

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="manifest" href="manifest">
</head>
<body>
    
</body>
</html>