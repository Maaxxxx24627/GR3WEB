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
  <h2>GestionOffres De Stages</h2>
  <form id="formOffre" method="post">
  <form>
    <div class="form-group">
        <label for="Id_Offre_Stage">Id_Offre_Stage :</label>
        <input type="text" id="Id_Offre_Stage" name="Id_Offre_Stage" pattern="\d*" title="L'ID doit être un nombre.">
    </div>

    <div class="form-group">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" pattern="[A-Za-z\s]+" title="Le nom doit contenir uniquement des lettres.">
    </div>

    <div class="form-group">
      <label for="competences">COMPETENCES</label>
      <input type="text" id="competences" name="competences" pattern="[A-Za-z\s]+" title="Le nom doit contenir uniquement des lettres.">
    </div>

    <div class="form-group">
      <label for="typePromotion">TYPE DE PROMOTIONS CONCERNEES</label>
      <input type="text" id="typePromotion" name="typePromotion" pattern="[A-Za-z\s]+" title="Le nom doit contenir uniquement des lettres.">
    </div>

    <div class="form-group">
      <label for="duree">DUREE DU STAGE</label>
      <input type="text" id="duree" name="duree" pattern="\d*" title="L'ID doit être un nombre.">
    </div>

    <div class="form-group">
      <label for="remuneration">BASE DE REMUNERATION</label>
      <input type="text" id="remuneration" name="remuneration" pattern="\d*" title="L'ID doit être un nombre.">
    </div>

    <div class="form-group">
      <label for="date">DATE DE L'OFFRE</label>
      <input type="date" id="date" name="date" pattern="\d*" title="L'ID doit être un nombre.">
    </div>

    <div class="form-group">
      <label for="id_Entreprise">Id_Entreprise :</label>
      <input type="text" id="id_Entreprise" name="id_Entreprise" pattern="\d*" title="L'ID doit être un nombre.">
    </div>

    <div class="form-group">
     <label for="dd_Utilisateur">Id_Utilisateur :</label>
      <input type="text" id="id_Utilisateur" name="id_Utilisateur" pattern="\d*" title="L'ID doit être un nombre.">
    </div>

    <div class="form-group">
     <label for="NombrePlaces">Nombre Places :</label>
      <input type="text" id="NombrePlaces" name="NombrePlaces" pattern="\d*" title="L'ID doit être un nombre.">
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
    var idOffreStage = document.getElementById('Id_Offre_Stage').value;
    var titre = document.getElementById('titre').value;
    var competences = document.getElementById('competences').value;
    var typePromotion = document.getElementById('typePromotion').value;
    var duree = document.getElementById('duree').value;
    var remuneration = document.getElementById('remuneration').value;
    var idEntreprise = document.getElementById('id_Entreprise').value;
    var idUtilisateur = document.getElementById('id_Utilisateur').value;
    var nombrePlaces = document.getElementById('NombrePlaces').value;


    if (!(idOffreStage === "" || /^\d*$/.test(idOffreStage)) || 
        !(duree === "" || /^\d*$/.test(duree)) || 
        !(remuneration === "" || /^\d*$/.test(remuneration)) || !!!!
        !(idEntreprise === "" || /^\d*$/.test(idEntreprise)) || 
        !(idUtilisateur === "" || /^\d*$/.test(idUtilisateur)) || 
        !(nombrePlaces === "" || /^\d*$/.test(nombrePlaces))) {
        alert('Les IDs, la durée, la rémunération et le nombre de places doivent être des nombres ou être laissés vides.');
        event.preventDefault();
    }


    if (!(titre === "" || /^[A-Za-z\s]*$/.test(titre)) || 
        !(competences === "" || /^[A-Za-z\s]*$/.test(competences)) || 
        !(typePromotion === "" || /^[A-Za-z\s]*$/.test(typePromotion))) {
        alert('Le titre, les compétences et le type de promotion doivent contenir uniquement des lettres ou être laissés vides.');
        event.preventDefault();
    }
});
</script>



</body>
</html>


<?php

if (isset($_POST['ajouter'])) {
    require '/var/www/douvinaigrette/MVC/app/core/ADD_Offre.php';
}

if (isset($_POST['supprimer'])) {
    $idToDelete = $_POST['Id_Offre_Stage'];
    require '/var/www/douvinaigrette/MVC/app/core/DELETE_Offre.php';
}

if (isset($_POST['modifier'])) {
    $idToModify = $_POST['Id_Offre_Stage'];
    require '/var/www/douvinaigrette/MVC/app/core/MODIFY_Offre.php';
}

    ?>