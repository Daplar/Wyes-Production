<?php

class Controller_suivi extends Controller
{
  public function action_suivi(){
    if (isset($_GET["id_prod"]))
    {
      $m=Model::getModel();
      $tab=['lunette_suivi'=>$m->getLunette($_GET["id_prod"])];
      $this->render('suivi',$tab);

    }
  }

  public function action_default()
  {
    $this->action_suivi();
  }
}

 ?>
