<?php

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
require_once('/var/www/douvinaigrette/MVC/app/core/Database.php');


class TestDB {
    use Database;

    public function getOffres() {
        $query = "SELECT * FROM OffreStage";
        $resultats = $this->query($query);

        if ($resultats) {
            echo json_encode($resultats);
        } else {
            echo json_encode(['error' => 'Aucune donnée trouvée.']);
        }
    }
}

$testDb = new TestDB();
$testDb->getOffres();

?>

