<?php 
	include_once('connexion.php');
        
	/**
	* Classe deputesBDManager
	*
	* Cette classe permet la gestion des députés dans la base de données dans l'exercice de debbugage
	*
	* @version 1.0
	* @author Neuhaus Olivier <neuhauso@edufr.ch>
	* @project Exercice 11 - debuggage
	*/
	class deputesBDManager
	{
		/**
		* Retourne la liste des députés d'une langue au format XML
		*
		* @param $langue La langue à laquelle rechercher les députés
		* @return liste de députés au format XML
		*/
		public function GetInXML($langue)
		{
			$count = 0;
			$params = array('langue' => $langue);
			$query = connexion::getInstance()->SelectQuery("SELECT * from t_depute where Langue = :langue", $params);
			$result = '<deputes>';
			foreach($query as $data){
				$result = $result . '<depute>';
				$result = $result . '<pk_depute>' . $data['PK_Depute'] . '</pk_depute>';
				$result = $result . '<nom>' . $data['Nom'] . '</nom>';
				$result = $result . '<langue>' . $data['Langue'] . '</langue>';
				$result = $result . '</depute>';
			}	
			$result = $result . '</deputes>';
			return $result;	
		}

		/**
		* Ajoute un député à la liste des députés
		*
		* @param $nom Le nom du député 
		* @param $langue La langue du député
		* @return la pk du député ajouté
		*/		
		public function Add($nom, $langue)
		{
			$query = "INSERT INTO T_Depute (Nom, Langue) values(:nom, :langue)";
			$params = array('nom' => $nom, 'langue' => $langue);
			$res = connexion::getInstance()->ExecuteQuery($query, $params);
			return connexion::getInstance()->GetLastId('T_Depute');		
		}
		
		/**
		* Modifie un député 
		*
		* @param $pkDepute La PK du député à modifier
		* @param $nom Le nom du député 
		* @param $langue La langue du député
		* @return 'True' si la modification a bien eu lieu, 'False' sinon
		*/	
		public function Update($pkDepute, $nom, $langue)
		{
			$query = "UPDATE T_Depute set Nom = :nom, Langue = :langue where PK_Depute = :pkDepute";
			$params = array('nom' => $nom, 'langue' => $langue, 'pkDepute' => $pkDepute);
			$res = connexion::getInstance()->ExecuteQuery($query, $params);
			if ($res > 0)
			{
				return 'True';
			}
			else{
				return 'False';
			}	
		}
		
		/**
		* Supprime un député 
		*
		* @param $pkDepute La PK du député à supprimer
		* @return 'True' si la suppression a bien eu lieu, 'False' sinon
		*/		
		public function Delete($pkDepute)
		{
			$query = "DELETE from T_Depute where PK_Depute = :pkDepute";
			$params = array('pkDepute' => $pkDepute);
			$res = connexion::getInstance()->ExecuteQuery($query, $params);
			if ($res > 0)
			{
				return 'True';
			}
			else{
				return 'False';
			}	
		}
		
	}
?>