
<h1> Ajoutez un composant </h1>

<form action = "?controller=production&action=add" method="post">
	<!--<p> <label> Numéro de série: <input type="text" name="serial_number_comp"/> </label> </p>-->
  <p>
		<label> Nom :
			<select name="name" size="1">
				<option value="glass">Verre</option>
				<option value="monture">Monture</option>
				<option value="chipset">Puce électronique</option>
				<option value="captor">Capteur</option>
			</select>
		</label>
	</p>
	<p><label> Quantité: <input type="text" name="quantity"/> </label></p>
  <p>  <input type="submit" value="Ajoutez dans la base de données"/> </p>
</form>
