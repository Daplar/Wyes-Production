<?php

class Controller_user extends Controller
{
  public function action_form_create(){
    $this->render('form_create',[]);
  }

  public function verification_create($infos){
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

   public function action_form_connection(){
     $this->render('form_connection',[]);
   }

   public function action_connection(){
     $m=Model::getModel();
     if($m->User_exists($_POST['login'],$_POST['password'])){
       echo('Vous êtes connecté');
       //il faut créer un cookie avec une session pour l'utilisateur avec son statut en paramètre
     }
     else {
       echo ($m->User_exists($_POST['login'],$_POST['password']));
       $this->render('message',
         ['title' => "",
         'message' => "Identifiants invalides, veuillez réessayer."]);
     }
   }

  public function action_create(){
    $this->verification_create($_POST);

    $m=Model::getModel();
    $m->addUser($_POST);

    $this->render('message',
		 ['title' => "",
		 'message' => "Nouvel utilisateur ajouté."]);
  }

  public function action_default(){
    $this->action_form_create();
  }
}

 ?>
