<?php


echo("zzz");
require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');

class TestDB {
    use Database;
}



$testDb = new TestDB();
$query = "SELECT * FROM OffreStage";
$resultats = $testDb->query($query);

if ($resultats) {
    echo json_encode($resultats->fetchAll(PDO::FETCH_ASSOC));
} else {
    // Gérer l'erreur
    echo json_encode(['error' => 'Impossible de récupérer les données.']);
}
