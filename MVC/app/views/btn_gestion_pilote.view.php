<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestion Offres de Stages</title>
<link rel="stylesheet" href="https://assets.douvinaigrette.sbihel.fr/btn_gestion_offre.css">
<link rel="manifest" href="manifest">
</head>
<body>


<div class="form-container">
<a href="gestion" class="gestion-link"><button class="site-button">Retour</button></a>
  <h2>GESTION PILOTES</h2>
  <form method="post">
  <form>
    <div class="form-group">
        <label for="Id_Pilote">Id_Pilote :</label>
        <input type="text" id="Id_Pilote" name="Id_Pilote" pattern="\d*" title="L'ID doit être un nombre.">
    </div>   
    <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" pattern="[A-Za-z\s]+" title="Le nom doit contenir uniquement des lettres.">
    </div>
    <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" pattern="[A-Za-z\s]+" title="Le nom doit contenir uniquement des lettres.">
    </div>
    <div class="form-group">
            <label for="centre">Centre :</label>
            <input type="text" id="centre" name="centre" pattern="[A-Za-z\s]+" title="Le nom doit contenir uniquement des lettres.">
    </div>
    <div class="form-group">
            <label for="promotion">Promotion :</label>
            <input type="text" id="promotion" name="promotion" pattern="[A-Za-z\s]+" title="Le nom doit contenir uniquement des lettres.">
    </div>

    <div class="buttons">
        <button type="submit" class="btn" id="ajouter" name="ajouter">Ajouter</button>
        <button type="submit" class="btn" id="modifier" name="modifier">Modifier</button>
        <button type="submit" class="btn" id ="supprimer" name="supprimer">Supprimer</button>
    </div>
  </form>
</div>


<script>
    document.querySelector('form').addEventListener('submit', function(event) {
    var idPilote = document.getElementById('Id_Pilote').value;
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var centre = document.getElementById('centre').value;
    var promotion = document.getElementById('promotion').value;

    // Validation de l'ID du pilote : doit être numérique si renseigné
    if (idPilote !== '' && !/^\d+$/.test(idPilote)) {
        alert('L\'ID du pilote doit être un nombre.');
        event.preventDefault(); // Empêche l'envoi du formulaire
    }

    // Validation pour les champs 'nom', 'prenom', 'centre', 'promotion'
    var champsTextuels = [nom, prenom, centre, promotion];
    var regexTextuel = /^[A-Za-z\s]*$/;
    var champsInvalide = champsTextuels.some(champ => champ !== '' && !regexTextuel.test(champ));

    if (champsInvalide) {
        alert('Le nom, prénom, centre et promotion doivent contenir uniquement des lettres ou être laissés vides.');
        event.preventDefault(); // Empêche l'envoi du formulaire
    }
});
</script>


</body>
</html>


<?php

if (isset($_POST['ajouter'])) {
    require '/var/www/douvinaigrette/MVC/app/core/ADD_Pilote.php';
}

if (isset($_POST['supprimer'])) {
    $idToDelete = $_POST['Id_Pilote'];
    require '/var/www/douvinaigrette/MVC/app/core/DELETE_Pilote.php';
}

if (isset($_POST['modifier'])) {
    $idToModify = $_POST['Id_Pilote'];
    require '/var/www/douvinaigrette/MVC/app/core/MODIFY_Pilote.php';
}

    ?>

