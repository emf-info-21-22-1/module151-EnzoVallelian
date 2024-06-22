$(document).ready(() => {
    // Initialisation lorsque le document est prêt
    // Appel à la fonction getallMoto avec la fonction de rappel displayMotos
    getallMoto(displayMotos, function (xhr, status, error) {
        console.error("Erreur lors de la récupération des données de moto:", status, error);
    });

    // Gestionnaire d'événement pour le formulaire d'ajout de moto
    $('#addMotoForm').on('submit', function (e) {
        e.preventDefault(); // Empêche la soumission par défaut du formulaire

        const motoData = {
            action: 'addMoto',
            name: $('#name').val(),
            hp: $('#hp').val(),
            cc: $('#cc').val(),
            weight: $('#weight').val()
        };

        // Appel à la fonction addMoto avec les données du formulaire
        addMoto(motoData, function (response) {
            if (response.success) {
                alert('Moto ajoutée avec succès.');
                $('#addMotoForm')[0].reset(); // Réinitialisation du formulaire
                // Rafraîchissement de la liste des motos après ajout
                getallMoto(displayMotos, function (xhr, status, error) {
                    console.error("Erreur lors de la récupération des données de moto:", status, error);
                });
            } else {
                alert('Erreur lors de l\'ajout de la moto: ' + response.message);
            }
        }, function (xhr, status, error) {
            console.error("Erreur lors de l'ajout de la moto:", status, error);
            alert('Erreur lors de l\'ajout de la moto.');
        });
    });
});

/* 
function getInfos() {
    alert("Bienvenue à " + localStorage.getItem('username'));
}*/
function displayMotos(data) {
    if (data) {
        const parsedData = JSON.parse(data); // Conversion des données JSON en objet JavaScript
        const motos = parsedData.moto;
        const motoContainer = document.getElementById('motoContainer');
        motoContainer.innerHTML = ''; // Nettoyage du conteneur avant ajout des nouvelles données

        motos.forEach(moto => {
            const motoElement = document.createElement('div');
            motoElement.classList.add('moto-item');

            // Création du contenu HTML pour chaque moto
            motoElement.innerHTML = `
                <p><strong>Nom:</strong> ${moto.name}</p>
                <p><strong>Puissance:</strong> ${moto.hp} hp</p>
                <p><strong>Cylindrée:</strong> ${moto.cc} cc</p>
                <p><strong>Poids:</strong> ${moto.weight} kg</p>
            `;

            motoContainer.appendChild(motoElement);
        });

        // Gestionnaire d'événement pour les détails des motos
        $('.moto-details').on('click', function () {
            const motoId = $(this).data('id');
            window.location.href = `moto.html?id=${motoId}`;
        });
    } else {
        console.error("Erreur lors de la récupération des données de moto.");
    }
}
