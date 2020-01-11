<?php

class Controller_gestion_user extends Controller
{
  public function action_gestion_user(){
    $m=Model::getModel();
    $this->render('control_user',[]);
  }

  public function action_default(){
    $this->action_gestion_user();
  }
}

 ?>
