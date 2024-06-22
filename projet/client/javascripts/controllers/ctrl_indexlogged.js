$(document).ready(() => {
   // getInfos();
    // Appel à la fonction getallMoto avec la fonction de rappel
    getallMoto(displayMotos, function (xhr, status, error) {
        console.error("Erreur lors de la récupération des données de moto:", status, error);
    });

    // Ajoutez un gestionnaire d'événements pour le formulaire d'ajout de moto
    $('#addMotoForm').on('submit', function (e) {
        e.preventDefault();

        const motoData = {
            action: 'addMoto',
            name: $('#name').val(),
            hp: $('#hp').val(),
            cc: $('#cc').val(),
            weight: $('#weight').val()
        };

        addMoto(motoData, function (response) {
            if (response.success) {
                alert('Moto ajoutée avec succès.');
                $('#addMotoForm')[0].reset();
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
        const parsedData = JSON.parse(data);
        const motos = parsedData.moto;
        const motoContainer = document.getElementById('motoContainer');
        motoContainer.innerHTML = ''; // Nettoyer le conteneur avant d'ajouter les nouvelles données

        motos.forEach(moto => {
            const motoElement = document.createElement('div');
            motoElement.classList.add('moto-item');

            motoElement.innerHTML = `
                <br> </br>
                <p><strong>Nom:</strong> ${moto.name}</p>
                <p><strong>Puissance:</strong> ${moto.hp} hp</p>
                <p><strong>Cylindrée:</strong> ${moto.cc} cc</p>
                <p><strong>Poids:</strong> ${moto.weight} kg</p>
            
              
            `;

            motoContainer.appendChild(motoElement);
        });

        $('.moto-details').on('click', function () {
            const motoId = $(this).data('id');
            window.location.href = `moto.html?id=${motoId}`;
        });
    } else {
        console.error("Erreur lors de la récupération des données de moto.");
    }
}
