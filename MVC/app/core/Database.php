<?php
trait Database {
    private function connect() {
        try {
            $host = 'localhost';
            $dbname = 'douvinaigrette';
            $username = 'projet_web_G3';
            $password = '&M;k3V?B]F&DDM7';
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connexion réussie à la base de données";
            return $pdo; // Retourne l'objet PDO
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function query($query, $data = []) {
        $con = $this->connect();
        if (!$con) {
            die("La connexion à la base de données a échoué.");
        }
        $stm = $con->prepare($query);

        try {
            if($stm->execute($data)) {
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            var_dump($_POST);
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
            
        }

        return false;
    }

    public function get_row($query, $data = []) {
        $con = $this->connect();
        if (!$con) {
            die("La connexion à la base de données a échoué.");
        }
        $stm = $con->prepare($query);

        try {
            if($stm->execute($data)) {
                return $stm->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            die("Erreur lors de la récupération de la ligne : " . $e->getMessage());
        }

        return false;
    }
}