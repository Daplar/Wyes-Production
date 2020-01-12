<?php require('view_begin.php');?>

<h1>Gestion des utilisateurs</h1>
<p> Voici la page pour gérer les patients </p>

<p>
<center>
<table>
<th>Nom</th>
<th>E-mail</th>
<th>Addresse</th>

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
	<?php if((isset($start) and $start != 1)): ?>
	<a href="?controller=patient&action=pagination&start=<?= $start-1 ?>">
		<img class="icone" src="Content/img/previous-icon.png"/>
	</a>
	<?php endif?>
	<?php for($i=1; $i<=3; $i++): ?>
		<a class="
		<?php
			if ($i == $start) {
				echo 'active' ;
			}else{
				echo 'lienStart';
			}
		?>
		"
		href="?controller=patient&action=pagination&start=<?= $i ?>"> <?= $i ?> </a>
	<?php endfor ?>
	<a href="?controller=patient&action=pagination&start=<?= $start+1 ?>">
		<img class="icone" src="Content/img/next-icon.png"/>
	</a>
</div>
</p>
<?php endif ?>


<?php require('view_end.php');?>
