<?php require('view_begin.php');
$m=Model::getModel(); ?>

<h1> Entrez l'id d'un produit pour obtenir ses informations </h1>

<form action = "?controller=suivi&action=suivi" method="post">
	<p> <label> Id du produit : <input type="text" name="id_prod"/> </label> </p>
  <p>  <input type="submit" value="Rechercher"/> </p>
</form>

<h2> Rechercher les infos à partir d'un critère : </h2>

<form action = "?controller=suivi&action=suivi_filter" method="post">
<p>
	<label> Critère :
		<select name="selected" size="1" >
		<?php foreach($m->getColumnsProduct() as $v){
				foreach ($v as $key => $value) {
					echo '<option value="'.$value.'" >'. $value.'</option>';
				}
			}
			?>
		</select>
	</label>
</p>
<p> <label> Entrez la valeure recherchée <input type="text" name="value"/> </label> </p>
<p>  <input type="submit" value="Rechercher"/> </p>
</form>

<?php require('view_end.php') ?>
