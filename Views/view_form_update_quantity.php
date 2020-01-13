
<h1> Modifier la quantité des composants selon leurs types </h1>

<form action = "?controller=production&action=update_quantity" method="post">
  <p>
		<label> Nom :
			<select name="name_comp" size="1">
      <?php foreach($m->getnameComp() as $v){
          foreach ($v as $key => $value) {
            echo '<option value="'.$value.'" >'. $value.'</option>';
          }
        }
        ?>
			</select>
		</label>
	</p>
  <p> <label> Quantité : <input type="text" name="quantity" /> </label></p>
	<p> <input type="submit" value="Modifier la quantité"/> </p>
</form>
