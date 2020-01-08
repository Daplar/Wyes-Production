<?php

class Controller_production extends Controller
{
  public function action_overview(){
    $m=Model::getModel();
    $tab=['overview'=>$m->getNbComponent()];
    $this->render('production',$tab);
  }

  public function action_default(){
    $this->action_overview();
  }
}

 ?>
