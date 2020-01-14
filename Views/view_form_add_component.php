<?php $m = Model::getModel(); ?>


<h1> Ajoutez un type de composant </h1>

<form action = "?controller=production&action=add_component" method="post">

  <p> <label> Nom du type du composant: <input type="text" name="name_comp"/> </label> </p>
  <p>  <input type="submit" value="Ajoutez dans la base de données"/> </p>
</form>
