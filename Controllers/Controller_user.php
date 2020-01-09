<?php

class Controller_user extends Controller
{
  public function action_form_create(){
    $this->render('form_create',[]);
  }

  public function verification($infos){
    //echo ('dans verif');
   if( (! isset($infos['name'])) or ($infos['name'] == '') ){
     //echo('pas de qté');
     $this->render('message',
       ['title' => "",
       'message' => "Le nom n'est pas renseigné, est une chaîne vide ou que des espaces, veuillez réesayez."]);
   }

   if( (! isset($infos['e_mail'])) or ($infos['e_mail'] == '') or preg_match('#^ *$#', $infos['e_mail'])){
			 $this->render('message',
				 ['title' => "",
				 'message' => "Veuillez entrez une adresse e_mail valide."]);
		 }


}

  public function action_create(){
    $this->verification($_POST);

    $m=Model::getModel();
    $tab=['new_user'=>$m->addUser($_POST)];

  }

  public function action_default(){
    $this->action_form_create();
  }
}

 ?>
