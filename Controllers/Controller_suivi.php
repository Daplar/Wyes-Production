<?php

class Controller_suivi extends Controller
{
  public function action_suivi(){
    if (isset($_POST["id_prod"]))
    {
      $m=Model::getModel();
      if ($m->isProdInDataBase($_POST["id_prod"])){
        $tab=['lunette_suivi'=>$m->getLunetteInfos($_POST["id_prod"])];
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

  public function action_suivi_filter(){
    if (isset($_POST["value"])){
      $m=Model::getModel();
      if ($m->getLunetteFilter($_POST["value"], $_POST["selected"])){
        $tab = ['lunette_suivi'=>$m->getLunetteFilter($_POST["value"], $_POST["selected"])];
        $this->render('suivi_filter',$tab);
      }
      echo ( $_POST["selected"]);
      $filtre = htmlentities($_POST["selected"], ENT_QUOTES);
      echo ($filtre);
      $string = str_replace (' " ', ' ',$filtre);
      echo ($string);
      $this->render('message',
        ['title' => "",
        'message' => "Cette valeur ne se trouve pas dans la base de donnnées"]);
    }
    $this->render('message',
      ['title' => "",
      'message' => "Aucune valeure n'a été rentrée"]);

  }

  public function action_form_suivi(){
    $this->render('form_suivi',[]);
  }

  public function action_default()
  {
    $this->action_form_suivi();
  }
}

 ?>
