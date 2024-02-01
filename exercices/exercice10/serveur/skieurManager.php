<?php 
	include_once('workers/skieurBDManager.php');
	include_once('beans/skieur.php');
    if (isset($_SERVER['REQUEST_METHOD']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$bdReader = new skieurBDManager();
			echo $bdReader->getInXML($_GET['paysId']);
		}
	}

?>