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
    
   // if ($password != passwordagain) {
   //     alert("mot de passe different");
//} else {



        // Appeler la fonction login avec les valeurs des champs

        createUserAjax(username, password, function (response) {
            // Succès de la requête
            console.log("Reponse du serveur:", response);
            // Traitez la réponse du serveur en fonction de vos besoins
        }, function (xhr, status, error) {
            // Erreur de la requête
            console.error("Erreur de requete:", status, error);
            // Affichez un message d'erreur à l'utilisateur ou gérez l'erreur de votre application
        });

        // Réinitialiser les champs de saisie si nécessaire
        $("#username").val('');
        $("#password").val('');
        $("#passwordagain").val('');
   // }
}



