<?php require('view_begin.php') ?>

<h1> Entrez l'id d'un produit pour obtenir ses informations </h1>


<form action = "?controller=suivi&action=suivi" method="post">
	<p> <label> Id du produit : <input type="text" name="id_prod"/> </label> </p>
  <p>  <input type="submit" value="Rechercher"/> </p>
</form>

<?php require('view_end.php') ?>
