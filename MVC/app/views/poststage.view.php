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
  <h2>GESTION OFFRES DE STAGES</h2>
  <form method="post">
  <form>
    <div class="form-group">
        <label for="Id_Offre_Stage">Id_Offre_Stage :</label>
        <input type="text" id="Id_Offre_Stage" name="Id_Offre_Stage">
    </div>

    <div class="form-group">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre">
    </div>

    <div class="form-group">
      <label for="competences">COMPETENCES</label>
      <input type="text" id="competences" name="competences">
    </div>

    <div class="form-group">
      <label for="typePromotion">TYPE DE PROMOTIONS CONCERNEES</label>
      <input type="text" id="typePromotion" name="typePromotion">
    </div>

    <div class="form-group">
      <label for="duree">DUREE DU STAGE</label>
      <input type="text" id="duree" name="duree" >
    </div>

    <div class="form-group">
      <label for="remuneration">BASE DE REMUNERATION</label>
      <input type="text" id="remuneration" name="remuneration" >
    </div>

    <div class="form-group">
      <label for="date">DATE DE L'OFFRE</label>
      <input type="date" id="date" name="date">
    </div>

    <div class="form-group">
      <label for="id_Entreprise">Id_Entreprise :</label>
      <input type="text" id="id_Entreprise" name="id_Entreprise">
    </div>

    <div class="form-group">
     <label for="dd_Utilisateur">Id_Utilisateur :</label>
      <input type="text" id="id_Utilisateur" name="id_Utilisateur">
    </div>

    <div class="buttons">
        <button type="submit" class="btn" id="ajouter" name="ajouter">Ajouter</button>
    </div>
  </form>
</div>

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