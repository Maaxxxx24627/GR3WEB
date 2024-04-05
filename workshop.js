$(document).ready(function() {
    $("#loadDataBtn").click(function() {
        $.ajax({
            url: "https://api.example.com/data",
            method: "GET",
            dataType: "json",
            success: function(response) {
                $("#modalData").html(response.data);
                $("#myModal").css("display", "block");
            },
            error: function(xhr, status, error) {
                console.error("Erreur lors de la requête AJAX :", error);
            }
        });
    });

    $(".close").click(function() {
        $("#myModal").css("display", "none");
    });

    $(window).click(function(event) {
        if (event.target == $("#myModal")[0]) {
            $("#myModal").css("display", "none");
        }
    });
});









































/*document.getElementById('codePostal').addEventListener('change', function() {
    var codePostal = this.value;
    fetch(`https://app.zipcodebase.com/api/v1/search?apikey=3415f020-df00-11ee-b481-7daa0f5b94f8&codes=${codePostal}&country=fr`)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Réponse du serveur non OK');
            }
        })
        .then(data => {
            const selectVille = document.getElementById('ville');
            selectVille.innerHTML = ''; // Vider les options existantes
            if (data.results && data.results[codePostal] && data.results[codePostal].length > 0) {
                data.results[codePostal].forEach(function(location) {
                
                    const option = new Option(location.city, location.postal_code);
                    selectVille.add(option);
                });
                
            } else {
                selectVille.add(new Option('Aucune ville trouvée', ''));
            }
        })
        .catch(error => console.error('Erreur lors de la récupération des données:', error));
});
*/