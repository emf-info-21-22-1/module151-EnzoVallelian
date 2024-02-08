<?php
include_once("connexion.php");
try {
  $object = new connexion();

  $object = $mysqlClient->__construct();
  //  echo $recipesStatement = $mysqlClient->prepare('SELECT * FROM t_equipe');
  echo "connexion réussi";
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
?>