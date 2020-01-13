<?php

class Controller_home extends Controller
{
  public function action_home(){
    $m=Model::getModel();
    $tab=['nb_lunettes'=>$m->getNblunettes(),'notif'=>$m->getNbLunettes(15)];
    $this->render('home',$tab);
  }



  public function action_default(){
    $this->action_home();
  }
}

 ?>
