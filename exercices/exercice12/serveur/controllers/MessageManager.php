<?php 
	include_once('workers/MessageBDManager.php');
	include_once('beans/Message.php');
        
	/**
	* Classe messageManager
	*
	* Cette classe permet la gestion des message dans l'exercice du livre d'or
	*
	* @version 1.0
	* @author Neuhaus Olivier <neuhauso@edufr.ch>
	* @project Exercice du livre d'or
	*/
	class MessageManager
	{
		
		/**
		* Fonction permettant d'écrire la liste des messages en format JSON.
		* @return la liste des messages au format JSON
		*/	
		public function getMessagesInJSON()
		{
			$messageBD = new messageBDManager();
			$listMessages = $messageBD->ReadMessages();
			
			$liste = array();
			for($i=0;$i<sizeof($listMessages);$i++) 
			{
				$liste[$i] = $listMessages[$i];						
			}
			return '{"messages":'. json_encode($liste) . '}';
		}
		
		/**
		* Fonction permettant d'ajouter un message à la liste des messages.
		* @param auteur le nom de l'auteur
		* @param message le message à ajouter
		* @return true si tout s'est passé correctement, sinon false.
		*/
		public function addMessage($auteur, $message)
		{
			$messageBD = new messageBDManager();
			return $messageBD->AddMessage($auteur, $message);			
		}
	}
?>