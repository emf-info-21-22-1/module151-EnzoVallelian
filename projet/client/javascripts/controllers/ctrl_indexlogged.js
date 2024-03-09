$(document).ready(() => {
    // Votre code ici
    $("#loginForm").submit((e) => {
        handleSubmit(e);
    });

    // Appel à la fonction getallMoto avec la fonction de rappel
    getallMoto(displayMotos, function (xhr, status, error) {
        console.error("Erreur lors de la récupération des données de moto:", status, error);
    });
});
// Fonction de rappel appelée en cas de succès
function displayMotos(data) {
    // Assurez-vous que les données sont bien présentes
    if (data && data.success) {
        // Récupérez les données de moto
        const motos = data.moto;

        // Sélectionnez l'élément où vous voulez afficher les données
        const motoContainer = document.getElementById('motoContainer');

        // Boucle à travers les données de moto
        motos.forEach(moto => {
            // Créez un élément pour afficher les informations de moto
            const motoElement = document.createElement('div');
            motoElement.classList.add('moto-item');

            // Remplissez l'élément avec les informations de moto
            motoElement.innerHTML = `
                <p>Puissance: ${moto.hp}</p>
                <p>Cylindrée: ${moto.cc}</p>
                <p>poids: ${moto.weight}</p>
                <p>Marque: ${moto.fk_marque}</p>
                <p>categiorie: ${moto.fk_categorie}</p>
                <p>nom: ${moto.name}</p>
             
                <button  id="motohtml">Details</button> <!-- Bouton pour chaque moto -->
            `;

            // Ajoutez l'élément de moto au conteneur
            motoContainer.appendChild(motoElement);
        });
    } else {
        // Gérez les cas d'erreur ou de données non disponibles
        console.error("Erreur lors de la récupération des données de moto.");
    }
}

// Appel à la fonction getallMoto avec la fonction de rappel
getallMoto(displayMotos, function (xhr, status, error) {
    console.error("Erreur lors de la récupération des données de moto:", status, error);
});
