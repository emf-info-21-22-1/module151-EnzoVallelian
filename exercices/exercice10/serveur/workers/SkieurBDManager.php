<?php 
	include_once('connexion.php');
	include_once('beans/Skieur.php');

        
	/**
	* Classe skieurBDManager
	*
	* Cette classe permet la gestion des skieurs dans la base de donn�ees dans l'exercice de debuggage
	*
	* @version 1.0
	* @author Neuhaus Olivier <neuhauso@edufr.ch>
	* @project Exercice 10 - debuggage
	*/
	class SkieurBDManager
	{
		/**
		* Fonction permettant la lecture des coureurs pour une �quipe.
		* Cette fonction permet de retourner la liste des skieurs se trouvant dans un pays donné
		* @param int $fkEquipe. Id du pays dans lequel se retrouvent les skieurs
		* @return liste de Skieur
		*/
		public function readCoureurs($fkPays)
		{
			$count = 0;
			$liste = array();
			$connection = new Connection();
			$query = $connection->executeQuery("select * from t_skieur where FK_Pays = " .$fkPays);
			foreach($query as $data){
				$coureur = new Skieur($data['PK_Skieur'], $data['Nom'], $data['Position']);
				$liste[$count++] = $coureur;
			}	
			return $liste;	
		}
		
		/**
		* Fonction permettant de retourner la liste des skieurs en XML.
		* @param int $fkEquipe. Id du pays dans lequel se retrouvent les skieurs
		* @return String. Liste des skieurs en XML
		*/
		public function getInXML($fkPays)
		{
			$listSkieurs = $this->readCoureurs($fkPays);
			$result = '<listeSkieurs>';
			for($i=0;$i<sizeof($listSkieurs);$i++) 
			{
				$result = $result .$listSkieurs[$i]->toXML();
			}
			$result = $result . '</listeSkieurs>';
			return $result;
		}
	}
?>