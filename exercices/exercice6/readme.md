# Exercice 6 - Introduction au PHP Object

## Objectif
La programmation objet (POO) avec PHP.
Les apprentis prennent connaissance avec la syntaxe objet de PHP.

## Ressources
https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php

## Travail à réaliser

1. Prenez connaissance au moins des chapitres suivants dans le tutoriel mentionné dans les ressources :
	Initiez-vous à la programmation orientée objet : https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/7307128-initiez-vous-a-la-programmation-orientee-objet-php

	Découvrez les objets et les classes : https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/7306872-decouvrez-les-objets-et-les-classes

	Créez vos propres classes : https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php/7306873-creez-vos-propres-classes


3. Voici une classe PHP (qui se trouve dans un fichier Membre.php) :
```php	
	<?php
	class Membre
	{
	        private $nom;
	        public $numero;
	        public function construct($nom, $numero)
	        {
	                $this->nom = $nom;
	                $this->numero = $numero;
	        }
	        public function getNom()
	        {
	                return $this->nom ;
	        }
	}
	?>
```

Le code suivant utilise cette classe :

```php
	<?php
	include_once('Membre')
	
	$membre = new Membre('paul');
	$Nom = $membre.getNom();
	$Numero = $membre.$numero;
	
	echo 'Un nouveau membre! Nom: ' $nom ', son âge: ' .$numero. '.';
	?>
```
Il y a malheureusement des erreurs dans ces deux extraits de code. Corrigez Ces erreurs (mettez-les en rouge pour vous en souvenir).
 
3. Reprenez l'exercice "3. Une première application en PHP" et transformez les scripts faisant offices de Controller et de Worker en PHP objet.
