$(document).ready(() => {
    $("#registerForm").submit((e) => {
        handleSubmit(e);
    });
});

function handleSubmit(event) {
    event.preventDefault();

    const username = $("#username").val();
    const password = $("#password").val();
    const passwordagain = $("#passwordagain").val();

    if (password === passwordagain) {
        // Appeler la fonction createUserAjax avec les valeurs des champs
        createUserAjax(username, password, function (response) {
            // Succès de la requête
            console.log("Réponse du serveur:", response);

            window.location.href = "http://localhost:8083/moto.html";

            // Afficher un message d'erreur si la création de compte a échoué


        }, function (xhr, status, error) {
            // Erreur de la requête
            console.error("Erreur de requête:", status, error);
            alert("Erreur lors de la requête AJAX. Veuillez réessayer.");
        });
    } else {
        // Afficher un message si les mots de passe ne correspondent pas
        alert("Les mots de passe ne correspondent pas.");
        $("#password").val('');
        $("#passwordagain").val('');
    }

    // Réinitialiser les champs de saisie
    $("#username").val('');
    $("#password").val('');
    $("#passwordagain").val('');
}
