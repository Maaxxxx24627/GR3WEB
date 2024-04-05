<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestion Eleves</title>
<link rel="stylesheet" href="https://assets.douvinaigrette.sbihel.fr/btn_gestion_offre.css">
<link rel="manifest" href="manifest">
</head>
<body>


<div class="form-container">
<a href="gestion" class="gestion-link"><button class="site-button">Retour</button></a>
  <h2>Gestion Eleves</h2>
  <form method="post">
    <div class="form-group">
        <label for="Id_Eleve">Id_Eleve :</label>
        <input type="text" id="Id_Eleve" name="Id_Eleve" pattern="\d*" title="L'ID doit être un nombre.">
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
    var idEleve = document.getElementById('Id_Eleve').value;
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var centre = document.getElementById('centre').value;
    var promotion = document.getElementById('promotion').value;

    // Validation de l'ID du Eleve : doit être numérique si renseigné
    if (idEleve !== '' && !/^\d+$/.test(idEleve)) {
        alert('L\'ID du Eleve doit être un nombre.');
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
    require '/var/www/douvinaigrette/MVC/app/core/ADD_Etudiant.php';
}

if (isset($_POST['supprimer'])) {
    $idToDelete = $_POST['Id_Eleve'];
    require '/var/www/douvinaigrette/MVC/app/core/DELETE_Etudiant.php';
}

if (isset($_POST['modifier'])) {
    $idToModify = $_POST['Id_Eleve'];
    require '/var/www/douvinaigrette/MVC/app/core/MODIFY_Etudiant.php';
}

    ?>

