<?php require('view_begin.php') ?>
<ul id="cemenu">
  <li> <div class="button">
      <form action="?controller=production" method="post" >
        <button type="submit">Composants</button> </form>
    </div> </li>
  <li> <div class="button">
    <form action="?controller=product" method="post" >
        <button type="submit">Produits</button> </form>
    </div> </li>
</ul>
<h1> Production </h1>

<h3> Coup d'oeil sur les stocks </h3>

<p> Il y a <strong><?php echo $nb_products  ?></strong> produits dans les stocks </p>


<h3>Lancer la production :</h3>
<p>Vous pouvez produire <strong><?php echo $nb_lunettes_can_prod ?></strong> lunettes avec les composants disponible dans les stocks</p>

<?php require('view_last_product.php') ?>
<?php require('view_form_add_product.php') ?>
<?php require('view_end.php') ?>
