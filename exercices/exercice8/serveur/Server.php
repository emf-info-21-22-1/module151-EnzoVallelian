<?php

include_once('ctrl/EquipeCtrl.php');
include_once('ctrl/JoueurCtrl.php');

switch ($_GET['action']) {
    case 'equipe':
        $equipes = new EquipeCtrl();
        echo $equipes->getEquipesInXML();
        break;
    case 'joueur':
        $joueurs = new JoueurCtrl();
        echo $joueurs->getJoueursInXML($_GET['equipeId']);
        break;
}
?>
