<?php

class Controller_production extends Controller
{
  public function action_overview(){
    $m=Model::getModel();
    $tab=['nb_components'=>$m->getNbComponent()];
    $this->render('production',$tab);
  }

  public function verification($infos){
    //echo ('dans verif');
   if( (! isset($infos['quantity'])) or ($infos['quantity'] == '') ){
     //echo('pas de qté');
     $this->render('message',
       ['title' => "Quantité non spécifié",
       'message' => "La quantité n'est pas renseignée, une chaîne vide ou que des espaces."]);
   }
}

  public function action_add(){
    //echo ('dans action add');
		$this->verification($_POST);
		$_POST['quantity'] = intval($_POST['quantity']);

		$m = Model::getModel();
		$m->addComponent($_POST);

		$this->render('message',
		 ['title' => "Composant ajouté",
		 'message' => "Le composant à été ajouté."]);
    $this->render('production',[]);
	}

/*  public function action_form_add(){
  $this->render('form_add', []);
}*/

  public function action_default(){
    $this->action_overview();
  }
}

 ?>
