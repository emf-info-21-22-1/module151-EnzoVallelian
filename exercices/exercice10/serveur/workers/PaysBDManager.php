<?php 
	include_once('connexion.php');
	include_once('beans/Pays.php');
        
	/**
	* Classe paysBDManager
	*
	* Cette classe permet la gestion des pays dans la base de données dans l'exercice de debbugage
	*
	* @version 1.0
	* @author Neuhaus Olivier <neuhauso@edufr.ch>
	* @project Exercice 10 - debuggage
	*/
	class PaysBDManager
	{
		/**
		* Fonction permettant la lecture des pays.
		* Cette fonction permet de retourner la liste des pays se trouvant dans la liste
		*
		* @return liste de Pays
		*/
		public function readPays()
		{
			$count = 0;
			$liste = array();
			$connection = new Connection();
			$query = $connection->executeQuery("select * from t_pays order by Nom");
			foreach($query as $data){
				$pays = new Pays($data['PK_pays'], $data['Nom']);
				$liste[$count++] = $pays;
			}	
			return $liste;	
		}
		
		/**
		* Fonction permettant de retourner la liste des pays en XML.
		*
		* @return String. Liste des pays en XML
		*/
		public function getInXML()
		{
			$listPays = $this->readPays();
			$result = '<listePays>';
			for($i=0;$i<sizeof($listPays);$i++) 
			{
				$result = $result .$listPays[$i]->toXML();
			}
			$result = $result . '</listePays>';
			return $result;
		}
	}
?>