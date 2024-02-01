# Exercice 8 - Connexion à une base de données

## Objectif
Connexion d'une application PHP avec une base de données MySql (ou MariaDB)
Les apprentis réalisent une application PHP, en POO, qui se va récupérer des données issues d'une base de données MySQL (ou MariaDB)

## Travail à réaliser

1. Repartez du résultat obtenu dans l’exercice "5. Passage de paramètres".
	
2. SANS TOUCHER LA PARTIE CLIENTE (Html, Javascript), à part pour l’appel du PHP, adaptez la partie SERVEUR de l’application pour aller lire les données dans une base de données mySQL.
   
	○ Créez une base de données mySQL en localhost sur votre poste.

	○ Importez les données se trouvant dans le fichier hockey_stats.sql.

	○ Dans la partie serveur, remplacez le fichier serveur.php utilisé jusqu’à maintenant par plusieurs fichiers PHPo.

	○ Respectez les demandes suivantes pour réaliser la partie serveur.
   	- Seul le 1er fichier PHP (celui qui est appelé par le client) est un PHP non-objet (script), tous les autres fichiers PHP doivent être objets.
	- Les informations de connexion à la base de données doivent être définies une seule et unique fois dans un seul PHPo.
	- Créez des beans pour représenter les joueurs et les équipes
	- Créez une classe Wrk (responsable d'accéder à la base de données)
	- Créez une classe Ctrl (responsable d'appeler le worker et de mettre sous format XML les données récupérées)
