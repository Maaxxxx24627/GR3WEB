

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internship Portal</title>
    <link rel="stylesheet" href="https://assets.douvinaigrette.sbihel.fr/index.css">
    <link rel="manifest" href="manifest">



    <?php
// Si ton fichier 'home.view.php' est dans '/var/www/douvinaigrette/MVC/app/views/'
require '/var/www/douvinaigrette/vendor/autoload.php';
?>

 

    <!-- Dans votre fichier index.view.php ou un fichier .js inclus -->
<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/var/www/douvinaigrette/MVC/public/service_worker.js')
      .then((reg) => {
        console.log('Service Worker enregistré avec succès', reg);
      })
      .catch((err) => {
        console.log('Erreur lors de l’enregistrement du Service Worker', err);
      });
  }
</script>

 

    <script>

        
        // JavaScript function to toggle the dropdown
        function toggleDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function openWishList() {
            // Open a new window with the wish list page. Replace 'wish-list.html' with the actual path.
            window.open('wish-list.html', '_blank');
        }
        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
        
    </script>
</head>


<body>
    <header>
        <div id="logo">
            <a href="HomePilote">
                <img src="https://assets.douvinaigrette.sbihel.fr/logo.png" alt="Company Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="gestionPilote">GESTION</a></li>
                <li><a href="btn_gestion_offrePilote">POSTER UN STAGE</a></li>
                <li><a href="workshop">TEST</a></li>
                <li><a class="login" href="login"><img src="https://assets.douvinaigrette.sbihel.fr/login-avatar.png" alt="Login"></a></li>
            </ul>
        </nav>
    </header>

    <div class="bouton"> 
    <ul class= "Filtres">
	<li><a href="#">Durée</a>
    
    <?php

        require_once('/var/www/douvinaigrette/MVC/app/models/OffreStage.php');

        // Instantiate the model
        $offreStageModel = new OffreStageModel();

        // Check if a filter has been applied through the GET request
        if (isset($_GET['duree'])) {
            // Fetch the filtered offers
            $offreStageModel->fetchOffresByDuree($_GET['duree']);
        } else {
            // Fetch all offers if no filter is applied
            $offreStageModel->fetchOffres();
        }  

        // Retrieve the offers from the model
        $offrestage = $offreStageModel->getOffre();
       
    ?>
 
    <ul class="sous-filtres">
        <li><a href="?duree=1">1 semaine</a></li>
        <li><a href="?duree=4">4 semaines</a></li>
        <li><a href="?duree=5-10">5 à 10 semaines</a></li>
        <li><a href="?duree=10-15">10 à 15 semaines</a></li>
    </ul>

	</li>
	<li><a href="#">Rémunération</a>

    <?php
        require_once('/var/www/douvinaigrette/MVC/app/models/OffreStage.php');

        // Instantiate the model
        $offreStageModel = new OffreStageModel();

        // Check if a filter has been applied through the GET request
        if (isset($_GET['remuneration'])) {
            // Fetch the filtered offers
            $offreStageModel->fetchOffresByRemuneration($_GET['remuneration']);
        } else {
            // Fetch all offers if no filter is applied
            $offreStageModel->fetchOffres();
        }  

        // Retrieve the offers from the model
        $offrestage = $offreStageModel->getOffre();
    ?>
		
        <ul class="sous-filtres">
			<li><a href="?remuneration=0-5">moins de 5€/h</a></li>
			<li><a href="?remuneration=5-10">5€/h à 10€/h</a></li>
			<li><a href="?remuneration=10-15">10€/h à 15€/h</a></li>
		</ul>
	</li>
	<li><a href="#">Secteur d'activité</a>

    <?php
        require_once('/var/www/douvinaigrette/MVC/app/models/OffreStage.php');

        // Instantiate the model
        $offreStageModel = new OffreStageModel();

        // Check if a filter has been applied through the GET request
        if (isset($_GET['activite'])) {
            // Fetch the filtered offers
            $offreStageModel->fetchOffresByActivite($_GET['activite']);
        } else {
            // Fetch all offers if no filter is applied
            $offreStageModel->fetchOffres();
        }  

        // Retrieve the offers from the model
        $offrestage = $offreStageModel->getOffre();
    ?>
		<ul class="sous-filtres">
			<li><a href="?activite=informatique">Informatique</a></li>
			<li><a href="?activite=medecine">Médecine</a></li>
			<li><a href="?activite=batiment">Batiment</a></li>
		</ul>
	</li>
	<li><a href="#">Niveau d'études</a>

    <?php
        require_once('/var/www/douvinaigrette/MVC/app/models/OffreStage.php');

        // Instantiate the model
        $offreStageModel = new OffreStageModel();

        // Check if a filter has been applied through the GET request
        if (isset($_GET['niveau'])) {
            // Fetch the filtered offers
            $offreStageModel->fetchOffresByNiveau($_GET['niveau']);
        } else {
            // Fetch all offers if no filter is applied
            $offreStageModel->fetchOffres();
        }  

        // Retrieve the offers from the model
        $offrestage = $offreStageModel->getOffre();
    ?>
		<ul class="sous-filtres">
			<li><a href="?niveau=CPI A2">Niveau Bac+2</a></li>
			<li><a href="?niveau=CPI A3">Niveau Bac+3</a></li>
			<li><a href="?niveau=CPI A4">Niveau Bac+4</a></li>
			<li><a href="?niveau=CPI A5">Niveau Bac+5</a></li>
		</ul>
	</li>
	</ul>
    <li class="Wish-list">
        <button onclick="window.location.href='wishlistPilote'">Wishlist</button>
    </li>
    </div>

    <main>
        <section id="internships">
            <h1>STAGES</h1>
            <div id="search-bar">
                <form method="GET">
                    <input type="search" name="s" placeholder="rechercher">
                    <input type="submit" value="Rechercher">
                </form>
            </div>

            <?php
            require_once('/var/www/douvinaigrette/MVC/app/models/OffreStage.php');
            $offreStageModel = new OffreStageModel();

            $offrestage = [];

            if (isset($_GET['s']) && !empty(trim($_GET['s']))) {
                $recherche = htmlspecialchars($_GET['s']);
                $offreStageModel->fetchOffresFiltered($recherche);
            } elseif (isset($_GET['duree'])) {
                $offreStageModel->fetchOffresByDuree($_GET['duree']);
            } elseif (isset($_GET['remuneration'])) {
                $offreStageModel->fetchOffresByRemuneration($_GET['remuneration']);
            } elseif (isset($_GET['activite'])) {
                $offreStageModel->fetchOffresByActivite($_GET['activite']);
            } elseif (isset($_GET['niveau'])) {
                $offreStageModel->fetchOffresByNiveau($_GET['niveau']);
            } else {
                $offreStageModel->fetchOffres();
            }

            $offrestage = $offreStageModel->getOffre();
?>

<?php if (!empty($offrestage)): ?>
    <?php foreach ($offrestage as $offre): ?>
        <div class="internship-container">
            <h2><?php echo htmlspecialchars($offre['Titre'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <div class="info-pair"><h3>Nom : </h3><span><?php echo htmlspecialchars($offre['NomEntreprise'], ENT_QUOTES, 'UTF-8'); ?></span></div>
            <div class="info-pair"><h3>Ville : </h3><span><?php echo htmlspecialchars($offre['VilleLocalisation'], ENT_QUOTES, 'UTF-8'); ?></span></div>
            <div class="info-pair"><h3>Compétences nécessaires : </h3><span><?php echo htmlspecialchars($offre['Competences'], ENT_QUOTES, 'UTF-8'); ?></span></div>
            <div class="info-pair"><h3>Type de promotion : </h3><span><?php echo htmlspecialchars($offre['TypePromotion'], ENT_QUOTES, 'UTF-8'); ?></span></div>
            <div class="info-pair"><h3>Durée : </h3><span><?php echo htmlspecialchars($offre['Durée'], ENT_QUOTES, 'UTF-8'); ?> semaines</span></div>
            <div class="info-pair"><h3>Rémunération : </h3><span><?php echo htmlspecialchars($offre['Rémunération'], ENT_QUOTES, 'UTF-8'); ?> €/h</span></div>
            <div class="info-pair"><h3>Date de début : </h3><span><?php echo htmlspecialchars($offre['Date'], ENT_QUOTES, 'UTF-8'); ?></span></div>
            <div class="info-pair"><h3>Nombre de places : </h3><span><?php echo htmlspecialchars($offre['NombrePlaces'], ENT_QUOTES, 'UTF-8'); ?></span></div>
            <div class="info-pair"><h3>Candidatures reçues : </h3><span><?php echo isset($offre['NombrePersonnePostulé']) ? htmlspecialchars($offre['NombrePersonnePostulé'], ENT_QUOTES, 'UTF-8') : 'Non spécifié'; ?></span></div>
            <div class="info-pair"><h3>Offre vedette : </h3><span><?php echo isset($offre['TopOffre']) ? htmlspecialchars($offre['TopOffre'], ENT_QUOTES, 'UTF-8') : 'Non'; ?></span></div>
            
            <form method="post" action="add_to_wishlist.php">
                <input type="hidden" name="offre_id" value="<?php $offre['Id_OffreStage']; ?>">
                <button type="submit" name="ajouter" class="Ajoutwish-list">Ajouter à la Wish-List</button>
            </form>

        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucune offre de stage trouvée.</p>
<?php endif; ?>
</section>

    </main>

    <footer>
    <div class="legal-info">
        <p>&copy; 2024 Douvinaigrette. Tous droits réservés. SIRET: 12345678901234</p>
        <p>Forme juridique: SAS | Capital social: 10 000€ | Siège social: 123 Rue soleil, 50440 Digulleville, France</p>
        <p>Hébergé par Bihel, Cherbourg, Autres informations pertinentes de l'hébergeur</p>
        <a href="cond">Conditions Générales d'Utilisation</a>
    </div>
</footer>


</body>
</html>