<?php require('view_begin.php') ?>

<h1> Créez votre compte </h1>

<?php $message = "En cliquant sur Inscription, vous acceptez nos Conditions générales d'utilisation." ?>

<form action = "?controller=user&action=create" method="post">
	<p> <label> NOM : <input type="text" name="name"/> </label> </p>
	<p> <label> LOGIN : <input type="text" name="login"/> </label></p>
  <p> <label> ADRESSE (facultatif): <input type="text" name="address"/> </label></p>
	<p> <label> ADRESSE E-MAIL : <input type="text" name="e_mail" placeholder="mail@serveur.com"/> </label></p>
	<p> <label> MOT DE PASSE : <input type="password" name="password" placeholder="8 caractères minimum"/> </label></p>

	<p>
		<label> <input type="radio" name="user_status" value="Sous-traitant"> Sous-traitant chargé des stocks </label>
		<label> <input type="radio" name="user_status" value="Membre"> Membre de l'ONG WYES </label>
	</p>

<p> <label> <input type="checkbox" name="conditions" value="Conditions" checked> <?php echo $message ?> </label> </p>

  <p>  <input type="submit" value="Inscription"/> </p>
</form>

<?php require('view_end.php') ?>
