# Exercice 3 - Equipes

## Objectif
Sujet	Application PHP sans architecture client / serveur
Les apprentis complètent une application PHP qui génère du code HTML.

## Travail à réaliser

Sur la base d'une application PHP conçue sur le modèle MVC2 (même si pour le moment, il ne s'agit pas encore de classes PHP), on vous demande de compléter le script qui joue le rôle de la vue (equipes.php) pour obtenir le résultat suivant :

![image](https://github.com/emf-info-151/module151/assets/48353440/7c988935-9b2b-46cb-a28f-a592b449428c)


Diagramme de classe : 

![image](https://github.com/emf-info-151/module151/assets/48353440/a938a583-4a79-4ef2-a5a9-640af8b7dc06)



Diagramme de séquence : 

![image](https://github.com/emf-info-151/module151/assets/48353440/95a0f1e5-70a0-4837-833d-6b648ee73f67)


Astuce : 
Créez un fichier "DockerFile" au même endroit que vos fichier PHP. C'est ce fichier qui va servir à créer le container. Dans notre cas, il y a plusieurs fichiers PHP, donc le DockerFile doit tous les copier (utiliser "." pour tout prendre dans le dossier courant). Le DockerFile ci-dessous fera l'affaire.
  ```DockerFile
# Utilisation de l'image PHP Apache
FROM php:apache
# Copier les fichiers de votre application dans le conteneur
COPY . /var/www/html/
# Exposer le port 80 du conteneur
EXPOSE 80
  ```
