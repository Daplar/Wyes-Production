<?php require "view_begin.php";
      $m = Model::getModel();
?>
<h1> Modifier le produit sélectionné </h1>

<form action = "?controller=product&action=update&id=<?= $id_prod ?>" method="post">
  <p> <label> Nom : <input type="text" name="name" value="<?= $name ?>"/></label> </p>
	<p> <label> Statut :
    <select name="status" size="1">
    <?php foreach($m->getStatusProd() as $v){
        foreach ($v as $key => $value) {
          if ($value == $name_comp){
            echo '<option value="'.$value.'" selected="selected">'. $value.'</option>';
          }else {
            echo '<option value="'.$value.'" >'. $value.'</option>';
          }
        }
      }
      ?>
    </select>
  </label> </p>
	<p> <label> numéro de Série : <input type="text" name="serial_number" value="<?= $serial_number ?>"/> </label></p>

	<p> <input type="submit" value="Modifier le produit"/> </p>
</form>
<?php require "view_end.php"; ?>
