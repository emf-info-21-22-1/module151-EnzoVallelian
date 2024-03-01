// Importez ou incluez la définition de la fonction login depuis httpService.js
// par exemple, si les fichiers sont dans le même répertoire :
// import { login } from './httpService.js';

$(document).ready(() => {
    $("#loginForm").submit((e) => {
        handleSubmit(e);
    });
});

// Quand le formulaire de login est soumis
function handleSubmit(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    // Récupérer les valeurs des champs
    const username = $("#username").val();
    const password = $("#password").val();

    // Appeler la fonction login avec les valeurs des champs
    login(username, password, function(response) {
        // Succès de la requête
        console.log("Reponse du serveur:", response);
        // Traitez la réponse du serveur en fonction de vos besoins
    }, function(xhr, status, error) {
        // Erreur de la requête
        console.error("Erreur de requete:", status, error);
        // Affichez un message d'erreur à l'utilisateur ou gérez l'erreur de votre application
    });

    // Réinitialiser les champs de saisie si nécessaire
    $("#username").val('');
    $("#password").val('');
}
