<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestion Offres de Stages</title>
<link rel="stylesheet" href="https://assets.douvinaigrette.sbihel.fr/btn_gestion_offre.css">
<link rel="manifest" href="manifest.json">

</head>
<body>


<div class="form-container">
<a href="gestion" class="gestion-link"><button class="site-button">Retour</button></a>
  <h2>GESTION OFFRES DE STAGES</h2>
  <form>

    <div class="form-group">
      <label for="competences">COMPETENCES</label>
      <input type="text" id="competences" name="competences" required>
    </div>

    <div class="form-group">
      <label for="lieu">LIEU</label>
      <input type="text" id="lieu" name="lieu" required>
    </div>

    <div class="form-group">
      <label for="entreprise">ENTREPRISE</label>
      <input type="text" id="entreprise" name="entreprise" required>
    </div>

    <div class="form-group">
      <label for="promo">TYPE DE PROMOTIONS CONCERNEES</label>
      <input type="text" id="promo" name="promo" required>
    </div>

    <div class="form-group">
      <label for="duree">DUREE DU STAGE</label>
      <input type="text" id="duree" name="duree" required>
    </div>

    <div class="form-group">
      <label for="remuneration">BASE DE REMUNERATION</label>
      <input type="text" id="remuneration" name="remuneration" required>
    </div>

    <div class="form-group">
      <label for="date">DATE DE L'OFFRE</label>
      <input type="date" id="date" name="date" required>
    </div>

    <div class="form-group">
      <label for="nombre">NOMBRE DE PLACES</label>
      <input type="number" id="nombre" name="nombre" required>
    </div>

    <div class="buttons">
      <button type="submit">AJOUTER</button>
      <button type="reset">SUPPRIMER</button>
      <button type="button">MODIFIER</button>
    </div>
  </form>
</div>

</body>
</html>
