$(document).ready(() => {
    $("#registerForm").submit((e) => {
        handleSubmit(e); // Gestion de la soumission du formulaire d'inscription
    });
});

function handleSubmit(event) {
    event.preventDefault(); // Empêche la soumission par défaut du formulaire

    const username = $("#username").val();
    const password = $("#password").val();
    const passwordagain = $("#passwordagain").val();

    if (password === passwordagain) {
        // Appel à la fonction createUser avec les valeurs du formulaire
        createUser(username, password, function (response) {
            console.log("Réponse du serveur:", response);

            // Redirection vers la page de login après succès
            window.location.href = "https://valleliane.emf-informatique.ch/151/client/index.html";
        }, function (xhr, status, error) {
            console.error("Erreur de requête:", status, error);
            alert("Erreur lors de la requête AJAX. Veuillez réessayer.");
        });
    } else {
        alert("Les mots de passe ne correspondent pas.");
        $("#password").val('');
        $("#passwordagain").val('');
    }

    // Réinitialisation des champs de saisie
    $("#username").val('');
    $("#password").val('');
    $("#passwordagain").val('');
}
