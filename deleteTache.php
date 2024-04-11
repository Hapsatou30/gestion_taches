<?php
require_once "config.php";

if(isset($_GET['id'])){
    $idTache = $_GET['id'];
}
$tache->supprimerTache($idTache);

header ('location: home.php');
exit();


?>


