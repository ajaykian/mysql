<?php
if (isset ($_POST['button'])){
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
//    $bdd->exec("INSERT INTO hiking (name,difficulty,distance,duration,height_difference ) VALUES('".$_POST['name']."','".$_POST['difficulty']."','".$_POST['distance']."','".$_POST['duration']."','".$_POST['height_difference']."')");
	$name= $_POST['name'];
	$difficulty= $_POST['difficulty'];
	$distance= $_POST['distance'];
	$duration= $_POST['duration'];
	$height= $_POST['height_difference'];
	$id= $_POST['id'];
	
   $bdd->exec("UPDATE hiking SET name='".$name."', difficulty='".$difficulty."', distance='".$distance."', duration='".$duration."', height_difference='".$height."' WHERE id='".$id."'");
}
	else{
		$id=$_GET['id'];
	}
	$tf = '';
	$f = '';
	$m = '';
	$d = '';
	$td = '';

	$bdd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', '');
	$req= $bdd->query('SELECT * FROM hiking WHERE id="'.$id.'"');
	$donnees= $req->fetch();
	
	switch($donnees['difficulty']) {
		case "très facile" :
		$tf = 'selected';
		$f = '';
		$m = '';
		$d = '';
		$td = '';
		break;
		case "facile" :
		$tf = '';
		$f = 'selected';
		$m = '';
		$d = '';
		$td = '';
		break;
		case "moyen" :
		$tf = '';
		$f = '';
		$m = 'selected';
		$d = '';
		$td = '';
		break;
		case "difficile" :
		$tf = '';
		$f = '';
		$m = '';
		$d = 'selected';
		$td = '';
		break;
		case "très difficile" :
		$tf = '';
		$f = '';
		$m = '';
		$d = '';
		$td = 'selected';
		break;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="./read.php">Liste des données</a>
	<h1>Modifier</h1>
	<form action="" method="post">
    <div>
			<label for="id">id</label>
			<input type="number" name="id" value=<?php echo $donnees['id'] ?>>
		</div>
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value=<?php echo $donnees['name'] ?>>
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php echo $tf ?>>Très facile</option>
				<option value="facile" <?php echo $f ?>>Facile</option>
				<option value="moyen" <?php echo $m ?>>Moyen</option>
				<option value="difficile" <?php echo $d ?>>Difficile</option>
				<option value="très difficile" <?php echo $td ?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value=<?php echo $donnees['distance'] ?>>
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value=<?php echo $donnees['duration'] ?>>
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value=<?php echo $donnees['height_difference'] ?>>
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>