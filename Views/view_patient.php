<?php require('view_begin.php');?>

<h1>Gestion des patients</h1>
<p> Voici la page pour gérer les patients </p>

<form action = "?controller=patient&action=search" method="post">
  <p> <label><input type="text" name="name" placeholder="Entrez le nom du patient"/> </label>
  <input type="submit" value="Recherchez"/> </p>
</form>


<p>
<center>
<table>
<th>Nom</th>
<th>E-mail</th>
<th>Adresse</th>

<?php foreach($patients as $v): ?>
<tr>
  <td><?= $v['name'] ?></td>
  <td><?= $v['e_mail'] ?></td>
  <td><?= $v['address'] ?></td>
</tr>
<?php endforeach ?>
</table>
</center>

<?php if(isset($start)): ?>
<div class="listePages">
	<p>Pages:</p>
	<?php if((isset($start) and $start != 0)): ?>
	<a href="?controller=patient&action=pagination&start=<?= $start-1 ?>">
		<img class="icone" src="Content/img/previous-icon.png"/>
	</a>
	<?php endif?>
	<?php for($i=0; $i<=10; $i++): ?>
		<a class="
		<?php
			if ($i == $start) {
				echo 'active' ;
			}else{
				echo 'lienStart';
			}
		?>
		" href="?controller=patient&action=pagination&start=<?= $i ?>"> <?= $i ?> </a>
	<?php endfor ?>
	<a href="?controller=patient&action=pagination&start=<?= $start+1 ?>">
		<img class="icone" src="Content/img/next-icon.png"/>
	</a>
</div>
</p>
<?php endif ?>


<?php require('view_end.php');?>
