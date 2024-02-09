<?php

header("Access-Control-Allow-Origin: http://localhost:8086");
header("Access-Control-Allow-Credentials: true");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['action'] == "connect") {
		if ($_POST["password"] == "emf") {

			$_SESSION['logged'] = "emf";
			echo "<result>true</result>";


		} else {
			$pwd = "";
			echo '<result>false</result>';
		}
		// doit controller que le password donné (en post) est bien 'emf'
		// si c'est ok => enregistrement de "emf" dans une variable de session et écrire '<result>true</result>'
		// si c'est faux => effacer la variable de session et écrire '<result>false</result>'

	}

	if ($_POST['action'] == "disconnect") {
		// effacer la variable de session et écrire <result>true</result>
		unset($_SESSION['logged']);
		echo '<result>false</result>';
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($_GET['action'] == "getInfos") {
		if (isset($_SESSION['logged']) && $_SESSION["logged"] == "emf") {


			// tout d'abord contrôler que la variable de session 'logged' contient bien "emf"
			// si oui => retourner <users><user><name>Victor Legros</name><salaire>9876</salaire></user><user><name>Marinette Lachance</name><salaire>7540</salaire></user><user><name>Gustave Latuile</name><salaire>4369</salaire></user><user><name>Basile Ledisciple</name><salaire>2384</salaire></user></users>
			echo "<users><user><name>Victor Legros</name><salaire>9876</salaire></user><user><name>Marinette Lachance</name><salaire>7540</salaire></user><user><name>Gustave Latuile</name><salaire>4369</salaire></user><user><name>Basile Ledisciple</name><salaire>2384</salaire></user></users>";



		} else {


			// si non => écrire <message>DROITS INSUFFISANTS</message>
			echo '<message>DROITS INSUFFISANTS</message>';



		}

	}
}

?>