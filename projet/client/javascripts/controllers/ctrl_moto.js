$(document).ready(function() {
    // Récupérer l'ID de la moto depuis l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const motoId = urlParams.get('id');

    // Appel à la fonction getOptionsByMotoId avec l'ID de la moto
    getOptionsByMotoId(motoId, function(data) {
        // Traitement des données reçues en succès
        console.log("Options de la moto:", data);
        // Vous pouvez ici manipuler les données reçues, les afficher dans la page, etc.
        // Par exemple, si vous avez une div avec l'id 'optionsContainer', vous pouvez les afficher comme ceci :
        // document.getElementById('optionsContainer').innerText = JSON.stringify(data);
    }, function(xhr, status, error) {
        // Gestion des erreurs
        console.error("Erreur lors de la récupération des options de la moto:", status, error);
    });

    // Appel à la fonction pour récupérer les informations de session
    getInfos();
});

// Fonction pour récupérer les informations de session
function getInfos() {
    document.getElementById('username').innerText = window.sessionStorage.getItem(StorageItems.username);
    console.alert("Bienvenue a "+ window.sessionStorage.getItem(StorageItems.username));
}

// Gestionnaire d'événements pour soumettre le formulaire de logout
$(document).ready(function() {
    $("#motoLogOut").submit(function(event) {
        handleSubmit(event);
    });
});

// Fonction pour gérer la déconnexion
function handleSubmit(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    logOut(function(response) {
        // Succès de la requête
        console.log("Réponse du serveur:", response);
        window.location.href = "https://valleliane.emf-informatique.ch/151/client/index.html";
    }, function(xhr, status, error) {
        // Erreur de la requête
        alert("Utilisateur inconnu");
        console.error("Erreur de requête:", status, error);
        // Affichez un message d'erreur à l'utilisateur ou gérez l'erreur de votre application
    });
}
