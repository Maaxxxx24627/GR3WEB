<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://assets.douvinaigrette.sbihel.fr/changemdp.css">
<title>Changement de mot de passe</title>
<link rel="manifest" href="manifest">
</head>
<body>
<div class="container">
    <h2>Changer votre mot de passe</h2>
    <form action="chemin-vers-serveur" method="post">
        <input type="email" name="email" placeholder="Entrez votre email" required>
        <input type="password" name="password" placeholder="Entrez votre nouveau mot de passe" required>
        <input type="password" name="confirm-password" placeholder="Confirmez votre nouveau mot de passe" required>
        <button type="submit" class="btn">Réinitialiser le mot de passe</button>
    </form>
</div>
</body>
</html>
