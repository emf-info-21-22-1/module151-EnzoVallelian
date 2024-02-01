<?php 
	include_once('workers/paysBDManager.php');
	include_once('beans/pays.php');
        
    if (isset($_SERVER['REQUEST_METHOD']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$paysBD = new paysBDManager();
			echo $paysBD->getInXML();
		}
	}
?>