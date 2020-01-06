<?php
$dsn='localhost';
$login='root';
$mdp='';
require_once "Models/Model.php";
$m = Model::getModel();
$m->getOverview();
?>
