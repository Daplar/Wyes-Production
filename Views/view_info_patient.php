<?php require('view_begin.php');?>

<h1>Gestion des patients</h1>
<p> Voici les infos du patient '<?=$_POST['name']?>'  </p>

<form action = "?controller=patient&action=search" method="post">
  <p> <label><input type="text" name="name" placeholder="Entrez le nom du patient"/> </label>
  <input type="submit" value="Recherchez"/> </p>
</form>

<p>
<table>
<th>Id du patient</th>
<th>Nom</th>
<th>E-mail</th>
<th>Adresse</th>
<th>Avis</th>
<?php foreach($info_patient as $v): ?>
  <tr>
  <?php foreach($v as $value): ?>
      <td><?= $value ?></td>
  <?php endforeach ?>
  </tr>
<?php endforeach ?>
</table>
</p>

<?php require('view_end.php');?>
