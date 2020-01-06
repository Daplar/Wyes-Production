<?php

class Controller_home extends Controller
{
  public function action_home(){
    $m=Model::getModel();
    $tab=['overview'=>$m->getOverview()];
    $this->render('home',$tab);
  }

  public function action_default(){
    $this->action_home();
  }
}

 ?>
