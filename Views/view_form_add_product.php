<?php $m = Model::getModel(); ?>


<h1> Ajoutez un produit </h1>

<form action = "?controller=product&action=add" method="post">
	<!--<p> <label> Numéro de série: <input type="text" name="serial_number_comp"/> </label> </p>-->
  <p><label> Nom: <input type="text" name="name"/> </label></p>
  <p> <label> Numéro de série: <input type="text" name="serial_number"/> </label> </p>
  <p>
		<label> Nom :
			<select name="status" size="1">
      <?php foreach($m->getStatusProd() as $v){
          foreach ($v as $key => $value) {
            echo '<option value="'.$value.'" >'. $value.'</option>';
          }
        }
        ?>
			</select>
		</label>
	</p>
  <p>  <input type="submit" value="Ajoutez dans la base de données"/> </p>
</form>
