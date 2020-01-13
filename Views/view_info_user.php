<?php require('view_begin.php');?>

<h1>Gestion des patients</h1>
<p> Voici les infos de l'utilisateur'<?=$_POST['name']?>'  </p>

<form action = "?controller=gestion_user&action=search" method="post">
  <p> <label><input type="text" name="name" placeholder="Entrez le nom de l'utilisateur"/> </label>
  <input type="submit" value="Recherchez"/> </p>
</form>

<p>
<table>
<th>Id User</th>
<th>Nom</th>
<th>Adresse</th>
<th>E-mail</th>
<th>Statut</th>
<th>Mot de passe</th>
<th>Pseudo</th>
<th>Historique</th>
<?php foreach($info_user as $v): ?>
  <tr>
  <?php foreach($v as $value): ?>
      <td><?= $value ?></td>
  <?php endforeach ?>
  </tr>
<?php endforeach ?>
</table>
</p>

<?php require('view_end.php');?>
