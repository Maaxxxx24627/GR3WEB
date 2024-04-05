<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    
<script>
function loadData() {
    fetch('https://douvinaigrette.sbihel.fr/API')
    .then(response => response.json())
    .then(data => {
        let table = document.querySelector('#data-table');
        if (!table) {
            table = document.createElement('table');
            table.id = 'data-table';
            table.border = '1';
            table.innerHTML = `<thead><tr>
                    <th>Id_OffreStage</th>
                    <th>Titre</th>
                    <th>Competences</th>
                    <th>TypePromotion</th>
                    <th>Durée</th>
                    <th>Rémunération</th>
                    <th>Date</th>
                    <th>Id_Entreprise</th>
                    <th>Id_Utilisateur</th>
                </tr></thead><tbody></tbody>`;
            document.body.appendChild(table);
        }
        
        const tableBody = table.querySelector('tbody');
        tableBody.innerHTML = ''; // Vide le corps du tableau pour le nouveau contenu
        data.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${row.Id_OffreStage}</td>
                            <td>${row.Titre}</td>
                            <td>${row.Competences}</td>
                            <td>${row.TypePromotion}</td>
                            <td>${row.Durée}</td>
                            <td>${row.Rémunération}</td>
                            <td>${row.Date}</td>
                            <td>${row.Id_Entreprise}</td>
                            <td>${row.Id_Utilisateur}</td>`;
            tableBody.appendChild(tr);
        });
    })
    .catch(error => console.error('Erreur lors du chargement des données:', error));
}

// Appeler loadData à l'initialisation et configurer le sondage périodique
document.addEventListener('DOMContentLoaded', function() {
    loadData();
    setInterval(loadData, 5000); // Rafraîchit les données toutes les 5 secondes
});
</script>
</body>
</html>
