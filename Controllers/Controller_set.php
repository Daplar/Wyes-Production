<?php
 class Controller_set extends Controller{

	public function verification($infos){
		 if( (! isset($infos['name'])) or ($infos['name'] == '') or preg_match('#^ *$#', $infos['name'])){
			 $this->render('message',
				 ['title' => "Nom du composant non spécifié",
				 'message' => "Le nom est vide, une chaîne vide ou que des espaces."]);
		 }

		 if( (! isset($infos['serial_number_comp'])) or ($infos['serial_number_comp'] == '') or preg_match('#^ *$#', $infos['serial_number_comp'])){
			 $this->render('message',
				 ['title' => "Numéro de série non spécifié",
				 'message' => "Le numéro de série est vide, une chaîne vide ou que des espaces."]);
		 }


		 if( (! isset($infos['quantity'])) or (! is_int($infos['quantity'])) or (! ($infos['quantity']) > 0) ){
			 $this->render('message',
				 ['title' => "Pas de quantité spécifiée",
				 'message' => "La quantité n'est pas valide (pas dans le formulaire) ou ce n'est pas un nombre."]);
		 }
	}

	public function action_add(){
		$this->verification($_POST);

		$_POST['quantity'] = intval($_POST['quantity']);

		$m = Model::getModel();
		$m->addComponent($_POST);

		$this->render('message',
		 ['title' => "Composant ajouté",
		 'message' => "Le composant à été ajouté."]);
	}

	public function action_remove(){
		 if(!isset($_GET['id'])){
			 $this->render('message',
				 ['title' => "Pas d'id",
				 'message' => "Aucun id n'est défini dans les paramètres de l'URL."]);
		 }

		 $id = $_GET['id'];
		 $m = Model::getModel();
		 if(! $m->isInDataBase($id)){
			 $this->render('message',
				 ['title' => "Le composant n'existe pas",
				 'message' => "Il n'y a pas de composant qui correspond à cet id."]);
		 }

		 $inf = $m->removeNobelPrize($id); // Contient les infos d'un prix nobel


		 $this->render('message',
			 ['title' => "Composant supprimé",
			 'message' => "Le composant à été supprimé."]);
	}

	public function action_update(){
		 $this->verification($_POST);

		 $_POST['quantity'] = intval($_POST['quantity']);
		 /*
		  * L'id du prix nobel n'est pas dans le formulaire. Il est cependant
		  * dans l'URL, on peut donc le ré-utiliser.
		  */
		 $_POST['id'] = $_GET['id'];
		 $m = Model::getModel();
		 $m->updateNobelPrize($_POST);
		 $this->render('message',
			 ['title' => "Prix nobel modifié",
			 'message' => "Le prix nobel à été modifié."]);
	}

	public function action_form_add(){
		$this->render('form_add', []);
    }

	public function action_form_update() {
		 if(!isset($_GET['id'])){
			 $this->render('message',
				 ['title' => "Pas d'acteur",
				 'message' => "Aucun acteur n'est défini dans les paramètres de l'URL."]);
		 }

		 $id = $_GET['id'];
		 $m = Model::getModel();
		 if(! $m->isInDataBase($id)){
			 $this->render('message',
				 ['title' => "L'acteur n'existe pas",
				 'message' => "Il n'y a pas d'acteur qui correspond à cet id."]);
		 }

		 $inf = $m->getNobelPrizeInformations($id); // Contient les infos d'un prix nobel
		 $this->render('form_update',$inf);
	}

    public function action_default(){
      $this->action_form_add();
    }

}
