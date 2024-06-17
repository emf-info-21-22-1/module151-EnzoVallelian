$(document).ready(() => {
    getInfos();
    // Appel à la fonction getallMoto avec la fonction de rappel
    getallMoto(displayMotos, function (xhr, status, error) {
        console.error("Erreur lors de la récupération des données de moto:", status, error);

    });
});
/*const StorageItems = {
    username: 'username', // Remplacez 'username' par la clé que vous utilisez pour stocker le nom d'utilisateur
    // Ajoutez d'autres clés si nécessaire
};*/

function getInfos() {
    //document.getElementById('username').innerText = localStorage.getItem('username');
    alert("Bienvenue a " + localStorage.getItem('username'));
}
// Fonction de rappel appelée en cas de succès
function displayMotos(data) {
    // Assurez-vous que les données sont bien présentes et que l'opération a réussi
    if (data) {
        // Convertissez la chaîne JSON en objet JavaScript
        const parsedData = JSON.parse(data);

        // Récupérez les données de moto
        const motos = parsedData.moto;

        // Sélectionnez l'élément où vous voulez afficher les données
        const motoContainer = document.getElementById('motoContainer');

        // Boucle à travers les données de moto
        motos.forEach(moto => {
            // Créez un élément pour afficher les informations de moto
            const motoElement = document.createElement('div');
            motoElement.classList.add('moto-item');

            // Remplissez l'élément avec les informations de moto et ajoutez un bouton de détails
            motoElement.innerHTML = `
            <br> </br>
            
            
                <p><strong>Nom:</strong> ${moto.name}</p>
                <p><strong>Puissance:</strong> ${moto.hp} hp</p>
                <p><strong>Cylindrée:</strong> ${moto.cc} cc</p>
                <p><strong>Poids:</strong> ${moto.weight} kg</p>
                <p><strong>Marque:</strong> ${moto.fk_marque}</p>
                <p><strong>Catégorie:</strong> ${moto.fk_categorie}</p>
               <button class="moto-details" data-id="${moto.pk_moto}">Détails</button>   <!--Bouton pour chaque moto avec l'ID de la moto -->
            `;

            // Ajoutez l'élément de moto au conteneur
            motoContainer.appendChild(motoElement);
        });

        // Ajoutez un gestionnaire d'événements à chaque bouton de détails
        $('.moto-details').on('click', function () {
            // Récupérez l'ID de la moto associée au bouton cliqué
            const motoId = $(this).data('id');

            // Redirigez l'utilisateur vers la page des détails de la moto avec l'ID de la moto dans l'URL
            window.location.href = `moto.html?id=${motoId}`;
        });
    } else {
        // Gérez les cas d'erreur ou de données non disponibles
        console.error("Erreur lors de la récupération des données de moto.");
    }
}
