<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($_POST['action'] == "connect")
	{
		// doit controller que le password donné (en post) est bien 'emf'
		// si c'est ok => enregistrement de "emf" dans une variable de session et écrire '<result>true</result>'
		// si c'est faux => effacer la variable de session et écrire '<result>false</result>'
		echo '<result>false</result>';
	}

	if($_POST['action'] == "disconnect")
	{
		// effacer la variable de session et écrire <result>true</result>
		echo '<result>true</result>';
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if($_GET['action'] == "getInfos")
	{
		// tout d'abord contrôler que la variable de session 'logged' contient bien "emf"
		// si oui => retourner <users><user><name>Victor Legros</name><salaire>9876</salaire></user><user><name>Marinette Lachance</name><salaire>7540</salaire></user><user><name>Gustave Latuile</name><salaire>4369</salaire></user><user><name>Basile Ledisciple</name><salaire>2384</salaire></user></users>
		// si non => écrire <message>DROITS INSUFFISANTS</message>
		echo '<message>DROITS INSUFFISANTS</message>';
	}
}

?>