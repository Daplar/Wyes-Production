<?php
require_once "Models/Model.php";
$m = Model::getModel();
print_r($m->getNbLunettes());
print_r($m->getNbComponent());
?>
