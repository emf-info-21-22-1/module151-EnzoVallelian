<?php
if($_GET['action'] == "equipe")
{
	echo '<equipes>';
	echo '<equipe><id>3</id><nom>SC Bern</nom></equipe>';
	echo '<equipe><id>4</id><nom>Fribourg-Gotteron</nom></equipe>';
	echo '<equipe><id>7</id><nom>HC Davos</nom></equipe>';
	echo '<equipe><id>8</id><nom>Geneve-Servette</nom></equipe>';
	echo '</equipes>';
}
if($_GET['action'] == "joueur")
{
	echo '<joueurs>';
	if ($_GET['equipeId'] == '3')
	{
		echo '<joueur><id>2</id><nom>Ivo Ruthemann</nom><points>56</points></joueur>';
		echo '<joueur><id>3</id><nom>Franco Collenberg</nom><points>15</points></joueur>';
		echo '<joueur><id>4</id><nom>Marco Buhrer</nom><points>6</points></joueur>';
		echo '<joueur><id>5</id><nom>Martin Pluss</nom><points>1</points></joueur>';
	}
	if ($_GET['equipeId'] == '4')
	{
		echo '<joueur><id>2</id><nom>Julien Sprunger</nom><points>15</points></joueur>';
		echo '<joueur><id>3</id><nom>Beni Pluss</nom><points>12</points></joueur>';
		echo '<joueur><id>4</id><nom>Adrien Lauper</nom><points>3</points></joueur>';
		echo '<joueur><id>5</id><nom>Mike Knopfli</nom><points>9</points></joueur>';
	}
	if ($_GET['equipeId'] == '8')
	{
		echo '<joueur><id>2</id><nom>Goran Bezina</nom><points>11</points></joueur>';
		echo '<joueur><id>3</id><nom>Rico Fata</nom><points>66</points></joueur>';
		echo '<joueur><id>4</id><nom>John Fritsche</nom><points>10</points></joueur>';
		echo '<joueur><id>5</id><nom>Tobias Stephan</nom><points>9</points></joueur>';
	}
	if ($_GET['equipeId'] == '7')
	{
		echo '<joueur><id>2</id><nom>Reto von Arx</nom><points>9</points></joueur>';
		echo '<joueur><id>3</id><nom>Jan von Arx</nom><points>30</points></joueur>';
		echo '<joueur><id>4</id><nom>Beat Forster</nom><points>22</points></joueur>';
		echo '<joueur><id>5</id><nom>Sandro Rizzi</nom><points>60</points></joueur>';
	}
	echo '</joueurs>';
}

?>