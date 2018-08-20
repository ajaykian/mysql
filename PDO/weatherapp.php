<?php

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$resultat = $bdd->query('SELECT * FROM météo');

$donnees = $resultat->fetch();

while ($donnees = $resultat->fetch())
{
  echo $donnees['ville'];
  echo "<br>";
  echo $donnees['haut'];
  echo "<br>";
  echo $donnees['bas'];
  echo "<br>";
}
// echo $donnees[ville];
// echo $donnees[haut];
$resultat->closeCursor();
?>