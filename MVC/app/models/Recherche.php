<?php

require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class EntrepriseModel
{
    use Database; // Use the Database trait for database connection
    private $db;
    private $entreprises;

    public function __construct() {
        $this->db = $this->connect(); // Establish a database connection
        $this->entreprises = array();
    }

    public function fetchEntrepriseByName($nom) {
        $query = "SELECT * FROM Entreprise WHERE Nom LIKE :nom";
    
        $stmt = $this->db->prepare($query);
        $stmt->execute(['nom' => "%$nom%"]);
        $this->entreprises = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEntreprises() {
        return $this->entreprises;
    }
}
