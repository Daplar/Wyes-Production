<?php

class Controller_production extends Controller
{
  public function action_overview(){
    $m=Model::getModel();
    $tab=['nb_components'=>$m->getNbComponent(), 'last3Comp'=>$m->getLastComp(),'nb_lunettes_can_prod'=>$m->nb_prod_lunette()];
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

public function action_remove(){
   if(!isset($_GET['id'])){
     $this->render('message',
       ['title' => "Pas d'id défini'",
       'message' => "Aucun id de composant n'est défini dans les paramètres de l'URL."]);
   }

   $id = $_GET['id'];
   $m = Model::getModel();
   if(! $m->isInDataBase($id)){
     $this->render('message',
       ['title' => "Le composant n'existe pas",
       'message' => "Il n'y a pas de composant qui correspond à cet id."]);
   }

   $inf = $m->removeComponent($id); // Contient les infos du composant


   $this->render('message',
     ['title' => "Composant supprimé",
     'message' => "Le composant à été supprimé."]);
}

  public function action_add(){
    //echo ('dans action add');
		$this->verification($_POST);
		$_POST['quantity'] = intval($_POST['quantity']);

		$m = Model::getModel();
		$m->updateQuantity($_POST['name'],$_POST['quantity']);

		$this->render('message',
		 ['title' => "Composant ajouté",
		 'message' => "Le composant à été ajouté."]);
	}

  public function action_update(){
		 $this->verification($_POST);

		 $_POST['quantity'] = intval($_POST['quantity']);

		 $_POST['id_comp'] = $_GET['id'];
		 $m = Model::getModel();
		 $m->updateComponent($_POST);
		 $this->render('message',
			 ['title' => "Composant modifié",
			 'message' => "Le composant à été modifié."]);
	}

  public function action_form_update() {
   if(!isset($_GET['id'])){
     $this->render('message',
       ['title' => "Pas de composant",
       'message' => "Aucun composant n'est défini dans les paramètres de l'URL."]);
   }

   $id = $_GET['id'];
   $m = Model::getModel();
   if(! $m->isInDataBase($id)){
     $this->render('message',
       ['title' => "Le composant n'existe pas",
       'message' => "Il n'y a pas de composant qui correspond à cet id."]);
   }

   $inf = $m->getComponentInfos($id); // Contient les infos du composant
   $this->render('form_update',$inf);
}


/*  public function action_form_add(){
  $this->render('form_add', []);
}*/

  public function action_default(){
    $this->action_overview();
    $this->action_last();
    //echo "dans action par defaut";
  }
}

 ?>
