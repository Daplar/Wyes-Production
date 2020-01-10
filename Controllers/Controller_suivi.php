<?php

class Controller_suivi extends Controller
{
  public function action_suivi(){
    if (isset($_POST["id_prod"]))
    {
      $m=Model::getModel();
      if ($m->isProdInDataBase($_POST["id_prod"])){
        $tab=['lunette_suivi'=>$m->getLunette($_POST["id_prod"])];
        $this->render('suivi',$tab);
      }
      else {
        $this->render('message',
          ['title' => "",
          'message' => "Aucun produit ne correspond à cet id, veuillez réesayez."]);
      }
      }

    else {
      $this->render('message',
        ['title' => "",
        'message' => "L'id n'est pas renseigné"]);
    }
  }


  public function action_form_suivi(){
    $this->render('form_suivi',[]);
  }

  public function action_add_com(){
    if(isset($_POST["name"]) and isset($_POST["status"]) and isset($_POST["com"]))
    {
      $m=Model::getModel();
      $m->addCommentary($_POST["name"],$_POST["com"],$_POST["status"]);
      $tab=["coms"=>$m->getComs()];
      $this->render("com",$tab);
    }
  }

  public function action_default()
  {
    $this->action_form_suivi();
  }
}

 ?>
