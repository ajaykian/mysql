<?php
    try
    {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
    }
    $resultat = $bdd->query('SELECT * FROM hiking');

    // echo 'Votre message à bien été envoyer';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
      <!-- Afficher la liste des randonnées -->
      <table class="tableau">
                <tr>
                    <!-- <td class="tableau">id</td> -->
                    <td class="tableau">id</td>
                    <td class="tableau">name</td>
                    <td class="tableau">difficulty</td>
                    <td class="tableau">distance</td>
                    <td class="tableau">duration</td>
                    <td class="tableau">dénivelé</td>
                    <td class="tableau">modification</td>
                    <td  class="tableau">supprimer</td>
                </tr>
                <?php while ($donnees = $resultat->fetch()) { ?>
                 <tr>
                    <?php $id=$donnees['id'];?>
                    <td class="tableau"><?php echo $id;?> </td>
                    <td class="tableau"><?php echo $donnees['name'];?> </td>
                    <td class="tableau"><?php echo $donnees['difficulty'];?></td>
                    <td class="tableau"><?php echo $donnees['distance'];?></td>
                    <td class="tableau"><?php echo $donnees['duration'];?></td>
                    <td class="tableau"><?php echo $donnees['height_difference'];?></td>
                    <?php echo '<td class="tableau"><a href="update.php?id='.$id.'">update</a></td>'?>
                    <?php echo '<td class="tableau"><a href="delete.php?id='.$id.'">supprimer</a></td>'?>
                    
                </tr>
                 <?php } ?>
    </table>
    <?php $resultat->closeCursor(); ?>
    
  </body>
</html>