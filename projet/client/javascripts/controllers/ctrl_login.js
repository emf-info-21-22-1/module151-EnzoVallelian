$(document).ready(() => {
    $("#loginForm").submit((e) => {
        handleSubmit(e); // Gestion de la soumission du formulaire de login
    });
});

function handleSubmit(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    const username = $("#username").val();
    const password = $("#password").val();

    // Appel à la fonction login avec les valeurs du formulaire
    login(username, password, function (response) {
        alert(username);
        console.log(username);
        localStorage.setItem('username', username);

        // Redirection vers la page protégée après succès
        console.log("Réponse du serveur:", response);
        window.location.href = "https://valleliane.emf-informatique.ch/151/client/indexlogged.html";
    }, function (xhr, status, error) {
        alert("Votre login ne fonctionne pas");
        console.error("Erreur de requête:", status, error);
    });

    // Réinitialisation des champs de saisie
    $("#username").val('');
    $("#password").val('');
}
