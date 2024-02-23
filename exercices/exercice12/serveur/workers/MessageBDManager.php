<?php 
	include_once('connexion.php');
	include_once('beans/Message.php');

        
	/**
	* Classe messageBDManager
	*
	* Cette classe permet la gestion des messages dans la base de données dans l'exercice du livre d'or
	*
	* @version 1.0
	* @author Neuhaus Olivier <neuhauso@edufr.ch>
	* @project Exercice du livre d'or
	*/
	class MessageBDManager
	{
		/**
		* Fonction permettant la lecture des messages.
		* @return liste de Message
		*/
		public function readMessages()
		{
			$count = 0;
			$liste = array();
			$connection = new Connection();
			$query = $connection->SelectQuery("select * from t_message");
			foreach($query as $data){
				$message = new Message($data['auteur'], $data['message']);
				$liste[$count++] = $message;
			}	
			return $liste;	
		}
		
		/**
		* Fonction permettant d'ajouter un message à la liste des messages.
		* @param auteur le nom de l'auteur
		* @param message le message à ajouter
		* @return true si tout s'est passé correctement, sinon false.
		*/
		public function addMessage($auteur, $message)
		{
			$res = "";
			$connection = new Connection();
			$sql = "insert into t_message (auteur, message) values ('" .$auteur . "','" .$message. "')";
			$resultat = $connection->executeQuery($sql);		
			if ($resultat)
			{
				$res = '{"result":true}';
			}
			else{
				$res = '{"result":false}';
			}
			return $res;
		}
	}
?>