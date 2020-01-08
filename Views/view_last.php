
<h1>
	Liste des derniers composants ajoutés dans la base de donées
</h1>

<p>
<table>
<th>Numéro de Série</th>
<th>Nom</th>
<th>Quantité</th>
<?php foreach($last3Comp as $v): ?>
<tr>
	<td><?= $v['serial_number_comp'] ?></td>
	<td><?= $v['name'] ?></td>
	<td><?= $v['quantity'] ?></td>
	<td>
	<a href="?controller=production&action=form_update&id=<?= $v['id_comp'] ?>">
		<img src="Content/img/modif-icon.png"/>
	</a>
</td>
<td>
	<a href="?controller=production&action=remove&id=<?= $v['id_comp'] ?>">
		<img class="icon" src="Content/img/remove-icon.png"/>
	</a>
</td>
</tr>
<?php endforeach ?>
</table>
</p>
