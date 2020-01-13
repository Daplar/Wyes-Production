<?php require('view_begin.php');?>

<h1>Page d'acceuil</h1>
<?php if ($notif) {
  echo ('<p> Attention : il y moins de 20 produit dans la base de données </p>');
}?>

<p> Il y a actuellement <strong><?php echo $nb_lunettes?></strong> produits dans la base de données </p>
<center>
  <h2>Bienvenue sur le site de Production de l'ONG WYES</h2>
  <strong><p> Ce projet a été réalisé par des élèves de l'IUT de Villetaneuse  </p></strong>
  <p> En collaboration avec la start-up WYES  </p>
  <img src="Content/img/hqdefault.jpg" alt="Lunette WYES">

</center>
</div>

<?php require('view_end.php');?>
