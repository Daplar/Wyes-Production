<?php

require_once "Models/Model.php";
require_once "Controllers/Controller.php";

<<<<<<< HEAD
$controllers=["home","production","set"];
=======
$controllers=["home","production"];
>>>>>>> 22bfc3168188c5b5898392f4d5f7bfb596483152
$controllers_default="home";

if(isset($_GET['controller']) and in_array($_GET['controller'],$controllers))
{
  $nom_controller=$_GET['controller'];
}else{
  $nom_controller=$controllers_default;
}

$nom_classe='Controller_'.$nom_controller;
$nom_fichier='Controllers/'.$nom_classe.'.php';

if(file_exists($nom_fichier)){
  include_once $nom_fichier;
  $controller =  new $nom_classe();
}else{
  exit("Error 404: not found.");
}
 ?>
