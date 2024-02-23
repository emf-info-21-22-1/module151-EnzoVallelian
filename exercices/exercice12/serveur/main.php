<?php

include_once './controllers/MessageManager.php';

    if (isset($_SERVER['REQUEST_METHOD']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$messageManager = new MessageManager();
			echo $messageManager->getMessagesInJSON();
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$messageManager = new MessageManager();
			echo $messageManager->addMessage($_POST['auteur'], $_POST['message']);
		}
	}
?>
