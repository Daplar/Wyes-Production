<?php require('view_begin.php') ?>

<h1> Entrez l'id d'un produit pour obtenir ses informations </h1>


<form action = "?controller=suivi&action=suivi" method="post">
	<p> <label> Id du produit : <input type="text" name="id_prod"/> </label> </p>
  <p>  <input type="submit" value="Rechercher"/> </p>
</form>

<h1>Espace commentaire</h1>
<div class="coms_space">
	<div class="coms">

	</div>
	<div class="add_com">
		<form action="?controller=suivi&action=add_com" method="post">
			<p><label>Nom : <input type="text" name="name"/> </label></p>
			<p><label>Status : <input type="text" name="status"/> </label></p>
			<p><label>Commentaire : <input type="text" name="com"/> </label></p>
			<p><input type="submit" value="Envoyer"/></p>
		</form>
	</div>
</div>

<?php require('view_end.php') ?>
