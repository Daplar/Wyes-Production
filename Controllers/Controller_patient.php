<?php

class Controller_patient extends Controller
{

  public function action_pagination() {
  $m = Model::getModel();
  $p = $_GET['start'] ?? 0; // Pagination commence à 0 par défaut

  $tab =
    ['patients' => $m->getAllPatients(null,$p*5),
    'start' => $_GET['start'] ?? 1];
  $this->render('patient', $tab);
  }

  public function action_search(){
    if (isset($_POST['name'])){
      $m = Model::getModel();
      if(!(empty($m->getNamePatient($_POST['name'])))){
        $infos = ['info_patient'=>$m->getNamePatient($_POST['name'])];
        $this->render('info_patient', $infos);
      }
      else{
        $this->render('message',
          ['title' => "",
          'message' => "Aucun patient ne correspond à ce nom, veuillez réesayez."]);

      }
      /*
      echo '<script language="Javascript">
        alert ("Aucun nom rentré" )
        </script>';*/
    }
    $this->action_default();
  }

  public function action_default(){
    //$this->action_patient();
    $this->action_pagination();
  }
}

 ?>
