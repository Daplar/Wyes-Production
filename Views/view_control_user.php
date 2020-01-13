<?php require('view_begin.php');?>

<h1>Gestion des utilisateurs</h1>
<p> Voici la page pour gérer les utilisateurs et leurs actions </p>

<form action = "?controller=gestion_user&action=search" method="post">
  <p> <label><input type="text" name="name" placeholder="Entrez le nom de l'utilisateur"/> </label>
  <input type="submit" value="Recherchez"/> </p>
</form>


<p>
<center>
<table>
<th>Nom</th>
<th>E-mail</th>
<th>Pseudo</th>

<?php foreach($users as $v): ?>
<tr>
  <td><?= $v['name'] ?></td>
  <td><?= $v['e_mail'] ?></td>
  <td><?= $v['login'] ?></td>
</tr>
<?php endforeach ?>
</table>
</center>

<?php if(isset($start)): ?>
<div class="listePages">
	<p>Pages:</p>
	<?php if((isset($start) and $start != 0)): ?>
	<a href="?controller=gestion_user&action=pagination&start=<?= $start-1 ?>">
		<img class="icone" src="Content/img/previous-icon.png"/>
	</a>
	<?php endif?>
	<?php for($i=0; $i<=3; $i++): ?>
		<a class="
		<?php
			if ($i == $start) {
				echo 'active' ;
			}else{
				echo 'lienStart';
			}
		?>
		" href="?controller=gestion_user&action=pagination_next&start=<?= $i ?>"> <?= $i ?> </a>
	<?php endfor ?>
	<a href="?controller=gestion_user&action=pagination_next&start=<?= $start+1 ?>">
		<img class="icone" src="Content/img/next-icon.png"/>
	</a>
</div>
</p>
<?php endif ?>


<?php require('view_end.php');?>
