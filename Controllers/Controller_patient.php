<?php

class Controller_patient extends Controller
{
  public function action_patient(){
    $m=Model::getModel();
    $this->render('patient',[]);
  }

  public function action_default(){
    $this->action_patient();
  }
}

 ?>
