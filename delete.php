<?php
require_once('read.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
try {
    $bdd->exec("DELETE FROM hiking WHERE  id='".$id."'")
 header('location:read.php');
} catch(PDOExeption $bdd) {

}
}