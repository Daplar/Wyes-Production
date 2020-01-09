<?php require('view_begin.php') ?>

<h1> Production </h1>

<h3> Coup d'oeil sur les stocks </h3>

<p> Il y a <?php echo $nb_components  ?> composants dans les stocks </p>


<h3>Lancer la production :</h3>
<p>Vous pouvez produire <?php echo $nb_lunettes_can_prod ?> lunettes avec les composants disponible dans les stocks</p>


<?php require('view_last.php') ?>
<?php require('view_form_add.php') ?>
<?php require('view_end.php') ?>
