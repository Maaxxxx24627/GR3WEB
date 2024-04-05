<?php

require_once __DIR__ . '/../core/Database.php';

class User {
    use Database;

    public function getUserByEmail($email) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function verifyUser($email, $password) {
        $user = $this->getUserByEmail($email);
        if ($user && password_verify($password, $user['MotDePasse'])) {
            // Authentification réussie
            return $user;
        }
        // Échec de l'authentification
        return false;
    }

    public function addUser($nom, $email, $password, $type) {
        $pdo = $this->connect();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email, MotDePasse, type) VALUES (:nom, :email, :MotDePasse, :type)");
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':MotDePasse' => $hashedPassword,
            ':type' => $type
        ]);
        return $pdo->lastInsertId();
    }
}