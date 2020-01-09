<?php require "view_begin.php";
      $m = Model::getModel();
?>
<h1> Modifier le composant sélectionné </h1>

<form action = "?controller=production&action=update&id=<?= $id_comp ?>" method="post">
  <p> <label> Numéro de Série : <input type="text" name="serial_number_comp" value="<?= $serial_number_comp ?>"/></label> </p>
	<p> <label> Nom :
    <select name="name_comp" size="1">
    <?php foreach($m->getnameComp() as $v){
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
	<p> <label> Quantité : <input type="text" name="quantity" value="<?= $quantity ?>"/> </label></p>

	<p> <input type="submit" value="Modifier le composant"/> </p>
</form>
<?php require "view_end.php"; ?>
