<?php

class Controller_gestion_user extends Controller
{
  public function action_pagination() {
  $m = Model::getModel();
  $p = $_GET['start'] ?? 0; // Pagination commence à 0 par défaut

  $tab =
    ['users' => $m->getAllUsers(null,$p*5),
    'start' => $_GET['start'] ?? 0];
  $this->render('control_user', $tab);
  }

  public function action_search(){
    if (isset($_POST['name'])){
      $m = Model::getModel();
      if(!(empty($m->getNameUser($_POST['name'])))){
        $infos = ['info_user'=>$m->getNameUser($_POST['name'])];
        $this->render('info_user', $infos);
      }
      else{
        $this->render('message',
          ['title' => "",
          'message' => "Ce nom ne correspond à aucun utilisateur dans la base de données."]);

      }
      $this->render('message',
        ['title' => "",
        'message' => "Aucun nom n'a été rentré."]);
    }
    $this->action_default();
  }

  public function action_default(){
    //$this->action_patient();
    $this->action_pagination();
  }
}

 ?>
