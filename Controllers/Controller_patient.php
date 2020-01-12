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

  public function action_default(){
    //$this->action_patient();
    $this->action_pagination();
  }
}

 ?>
