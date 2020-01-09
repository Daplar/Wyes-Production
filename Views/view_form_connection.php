<?php require('view_begin.php') ?>

<h1> Connectez-vous </h1>


<form action = "?controller=user&action=connection" method="post">
	<p> <label> LOGIN : <input type="text" name="login"/> </label> </p>
	<p> <label> MOT DE PASSE : <input type="text" name="password"/> </label></p>


  <p>  <input type="submit" value="Connexion"/> </p>
</form>

<?php require('view_end.php') ?>
