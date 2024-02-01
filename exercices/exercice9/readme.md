# Exercice 9 - Login et session

## Objectif
Gestion des sessions en PHP
Les apprentis utilisent les sessions PHP pour vérifier l'authentification d'un utilisateur.

## Contexte
La page index.html de l’exercice affiche la liste des employés d’une entreprise avec leur salaire. Ces données étant confidentielles, elles sont protégées par un mot de passe (« emf »).

Ainsi tant que l’utilisateur ne met pas le mot de passe « emf », le serveur devra retourner un message d’erreur. Dès que l’utilisateur sera logué, la liste des informations sera retournée.
 
Sans être logué : 

![image](https://github.com/emf-info-151/module151/assets/48353440/53ec19d0-5fe7-441b-8bb5-a2a60a2b82d5)

Après s’être logué : 

![image](https://github.com/emf-info-151/module151/assets/48353440/7e1dcc3c-aef0-4edf-b72f-ec573bb4b18d)

Le serveur PHP est responsable de contrôler si un utilisateur a le droit de voir une page. Les informations de login seront enregistrées dans la variable de session du serveur.

Pour ceci, la partie serveur (serveur.php) aura 3 fonctions (ou actions) :
	• connect : appelée lorsque le client souhaite se connecter. Cette méthode retourne ‘true’ si le mot de passe est bien emf et enregistre le mot de passe dans une variable de session (par exemple « logged »).
	• disconnect : appelée lorsque le client souhaite se déconnecter. Cette méthode efface la variable de session initialisée lors du connect.
	• getInfos : appelée lors du chargement de la page. Cette méthode retourne la liste des employés et leur salaire si l’utilisateur est logué, un message d’erreur sinon.


## Travail à réaliser
La partie cliente est déjà totalement fonctionnelle. Vous devez juste modifier l’accès au fichier PHP. 
Vous devez maintenant gérer la logique du fichier serveur.php

Pour bien comprendre le concept de la session, allez sur votre page depuis 2 navigateurs différents (Chrome et Edge par exemple) ce qui simulera l'accès par deux ordinateurs différents sur notre site.
![image](https://github.com/emf-info-151/module151/assets/48353440/9f19a637-ee7a-474e-92b7-fe06b558e308)
