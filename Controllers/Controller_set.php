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


		$m = Model::getModel();
		$m->addComponent($_POST);

		$this->render('message',
		 ['title' => "Composant ajouté",
		 'message' => "Le composant à été ajouté."]);
	}


	public function action_form_add(){
		$this->render('form_add', []);
    }



}
