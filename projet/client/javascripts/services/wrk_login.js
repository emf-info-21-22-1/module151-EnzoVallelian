function handleSubmit(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    // Récupérer les valeurs des champs
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Vous pouvez maintenant utiliser username et password comme vous le souhaitez (par exemple, les envoyer à un serveur pour traitement)
    console.log('Nom d\'utilisateur:', username);
    console.log('Mot de passe:', password);

    // Réinitialiser les champs de saisie si nécessaire
    document.getElementById('username').value = '';
    document.getElementById('password').value = '';
}

// Attacher le gestionnaire d'événements au formulaire lors du chargement de la page
window.onload = function() {
    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', handleSubmit);
}