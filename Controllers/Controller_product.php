<?php

class Controller_product extends Controller
{
  public function action_overview(){
    $m=Model::getModel();
    $tab=['nb_products'=>$m->getNbLunettes()??0, 'last3Comp'=>$m->getLastProd(),'nb_lunettes_can_prod'=>$m->nb_prod_lunette()];
    $this->render('product',$tab);
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
  public function action_product(){
    $this->render('product',[]);
  }
  public function action_update_quantity(){
    if ((! isset($_POST['quantity']))){
      $this->render('message',
        ['title' => "Quantité non spécifié",
        'message' => "La quantité n'est pas renseignée, une chaîne vide ou que des espaces."]);
    }
    $m=Model::getModel();
    $m->updateQuantity($_POST['name_comp'],$_POST['quantity']);
    $this->render('message',
      ['title' => "Quantité modifiée",
      'message' => 'La quantité a été modifié pour les produits de type '.$_POST['name_comp']]);
  }


public function action_remove_prod(){
   if(!isset($_GET['id'])){
     $this->render('message',
       ['title' => "Pas d'id défini'",
       'message' => "Aucun id de produit n'est défini dans les paramètres de l'URL."]);
   }

   $id = $_GET['id'];
   $m = Model::getModel();
   if(! $m->isProdInDataBase($id)){
     $this->render('message',
       ['title' => "Le produit n'existe pas",
       'message' => "Il n'y a pas de produit qui correspond à cet id."]);
   }

   $inf = $m->removeProduct($id); // Contient les infos du produit
   $this->render('message',
     ['title' => "produit supprimé",
     'message' => "Le produit à été supprimé."]);
}

  public function action_add(){
    //echo ('dans action add');
		//$this->verification($_POST);
		$_POST['status'] = intval($_POST['status']);

		$m = Model::getModel();
		$m->addProduct($_POST);

		$this->render('message',
		 ['title' => "Produit ajouté",
		 'message' => "Le produit à été ajouté."]);
	}

  public function action_update(){
		 //$this->verification($_POST);

		 //$_POST['quantity'] = intval($_POST['quantity']);

		 $_POST['id_prod'] = $_GET['id'];
		 $m = Model::getModel();
		 $m->updateProduct($_POST);
		 $this->render('message',
			 ['title' => "produit modifié",
			 'message' => "Le produit à été modifié."]);
	}

  public function action_form_update_prod() {
   if(!isset($_GET['id'])){
     $this->render('message',
       ['title' => "Pas de produit",
       'message' => "Aucun produit n'est défini dans les paramètres de l'URL."]);
   }

   $id = $_GET['id'];
   $m = Model::getModel();
   if(! $m->isProdInDataBase($id)){
     $this->render('message',
       ['title' => "Le produit n'existe pas dans la base de données",
       'message' => "Il n'y a pas de produit qui correspond à cet id."]);
   }

   $inf = $m->getLunetteInfos($id); // Contient les infos du produit
   $this->render('form_update_product',$inf);
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
