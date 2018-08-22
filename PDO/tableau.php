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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>tableau météo</title>
        <link rel="stylesheet" href="style.css"> 
    </head>
    <body>
        
        <table class="tableau">
                <tr class>
                    <td class="tableau">ville</td>
                    <td class="tableau">haut</td>
                    <td class="tableau">bas</td>
                </tr>
              
                 <?php while($donnees = $resultat->fetch()) { ?>    
                <tr class="tableau">
                    <td class="tableau"><?php echo $donnees['ville']; ?></td>
                    <td class="tableau"><?php echo $donnees['haut']; ?></td>
                    <td class="tableau"><?php echo $donnees['bas']; ?></td>
                </tr>
                 <?php } ?>
       </table> 
       <?php $resultat->closeCursor(); ?>

    </body>
</html>