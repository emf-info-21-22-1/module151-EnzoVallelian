$(document).ready(() => {
    $("#motoLogOut").submit((e) => {
        handleSubmit(e);
    });
});

// Quand le formulaire de login est soumis
function handleSubmit(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    
    logOut(function (response) {
        // Succès de la requête
        console.log("Reponse du serveur:", response);
        window.location.href = "http://localhost:8083/index.html"; 
        

        
      


        // Traitez la réponse du serveur en fonction de vos besoins
    }, function (xhr, status, error) {
        // Erreur de la requête
        
        alert(" utilisateur inconnu");
        console.error("Erreur de requete:", status, error);
        // Affichez un message d'erreur à l'utilisateur ou gérez l'erreur de votre application
    }); 

   
}
