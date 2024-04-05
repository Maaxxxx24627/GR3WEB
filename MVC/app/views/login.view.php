<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$errorMessage = '';

$cookieLifetime = time() + (86400 * 1);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=douvinaigrette', 'projet_web_G3', '&M;k3V?B]F&DDM7');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $errorMessage = "Impossible de se connecter à la base de données: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errorMessage)) {
    $email = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['MotDePasse'])) {
            $_SESSION['user_id'] = $user['Id_Utilisateur'];
            $_SESSION['user_name'] = $user['Nom'];
            $_SESSION['user_type'] = $user['Type'];

            setcookie("user_id", $user['Id_Utilisateur'], [
                'expires' => $cookieLifetime,
                'path' => '/',
                'secure' => true, // ou false si vous testez localement sans HTTPS
                'httponly' => true, // Rend le cookie inaccessible au JavaScript côté client
                'samesite' => 'Lax' // ou 'Strict' selon votre cas d'utilisation
            ]);

            switch($user['Type']) {
                case 'admin':
                    header('Location: HomeAdmin'); // Page d'accueil de l'administrateur
                    exit();
                case 'Pilote':
                    header('Location: HomePilote'); // Page d'accueil du pilote
                    exit();
                case 'Eleve':
                    header('Location: HomeEleve'); // Page d'accueil de l'élève
                    exit();
                default:
                    $errorMessage = "Type d'utilisateur non reconnu.";
                    break;
            }
        } else {
            $errorMessage = 'Identifiant ou mot de passe incorrect.';
        }
    } catch (PDOException $e) {
        $errorMessage = "Erreur lors de la vérification de l'utilisateur: " . $e->getMessage();
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://assets.douvinaigrette.sbihel.fr/login.css">
    <link rel="manifest" href="manifest">
</head>
<body>

<div class="login-container">
<div id="logo">
    <a href="Home">
        <img src="https://assets.douvinaigrette.sbihel.fr/logo.png" alt="Company Logo">
    </a>
</div>
    <div class="login-form">
        <h2>SE CONNECTER</h2>
        <!-- L'action est maintenant ce fichier lui-même -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group">
                <label for="username">EMAIL</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}" title="Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, un chiffre et un caractère spécial.">

            </div>
            <div class="input-group">
                <button type="submit">SE CONNECTER</button>
            </div>
            <?php
            if ($errorMessage != '') {
                echo '<div class="error-message">' . $errorMessage . '</div>';
            }
            ?>
        </form>
        <div class="links">
            <a href="gestion">GESTION</a>
            <a href="changemdp">PASSWORD LOST</a>
        </div>
    </div>
</div>





<script>
document.getElementById('login-form').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$/;
    
    if (!regex.test(password)) {
        event.preventDefault(); // Empêche la soumission du formulaire
        alert('Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, un chiffre et un caractère spécial.');
    }
});
</script>


</body>
</html>


<?


if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errorMessage)) {
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Expression régulière pour la validation du mot de passe
    $passwordPattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$/';

    if (!preg_match($passwordPattern, $password)) {
        $errorMessage = 'Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, un chiffre et un caractère spécial.';
    } else {
        // Le reste de votre code de validation et d'authentification
    }
}