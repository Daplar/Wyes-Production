<?php
$dsn='localhost';
$login='root';
$mdp='';
require_once "Models/Model.php";
$m = Model::getModel();
print_r($m->getOverview());
?>
