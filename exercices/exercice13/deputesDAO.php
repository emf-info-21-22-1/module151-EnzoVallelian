<?php 
	include_once('workers/deputesBDManager.php');
    
    if (isset($_SERVER['REQUEST_METHOD']))
	{
		switch ($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				if (isset($_GET['Langue']))
				{
					$deputeBD = new deputesBDManager();
					echo $deputeBD->GetInXML($_GET['Langue']);
				}
				else{
					echo 'Paramètre Langue manquant';
				}
				break;
			case 'POST':
				if (isset($_POST['Langue']) and isset($_POST['Nom']))
				{
					$deputeBD = new deputesBDManager();
					echo $deputeBD->Add($_POST['Nom'], $_POST['Langue']);
				}
				else{
					echo 'Paramètre Langue ou Nom manquant';
				}
				break;
			case 'PUT':
				parse_str(file_get_contents("php://input"), $vars);
				if (isset($vars['Langue']) and isset($vars['Nom']) and isset($vars['PK_Depute']))
				{
					$deputeBD = new deputesBDManager();
					echo $deputeBD->Update($vars['PK_Depute'], $vars['Nom'], $vars['Langue']);
				}
				else{
					echo 'Paramètre PK_Depute, Langue ou Nom manquant';
				}
				break;
			case 'DELETE':
				parse_str(file_get_contents("php://input"), $vars);
				if (isset($vars['PK_Depute']))
				{
					$deputeBD = new deputesBDManager();
					echo $deputeBD->Delete($vars['PK_Depute']);
				}
				else{
					echo 'Paramètre PK_Depute manquant';
				}
				break;
		}
	}
?>