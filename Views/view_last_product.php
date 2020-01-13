<h1>
	Liste des derniers produits ajoutés dans la base de données
</h1>

<p>
<table>
<th>Numéro de Série</th>
<th>Nom</th>
<th>Status</th>
<th>Modification</th>
<th>Suppression</th>
<?php foreach($last3Comp as $v): ?>
<tr>
	<td><?= $v['serial_number'] ?></td>
	<td><?= $v['name'] ?></td>
	<td><?= $v['status'] ?></td>
	<td>
	<a href="?controller=production&action=form_update_prod&id=<?= $v['id_prod'] ?>">
		<img src="Content/img/modif-icon.png"/>
	</a>
</td>
<td>
	<a href="?controller=production&action=remove_prod&id=<?= $v['id_prod'] ?>">
		<img class="icon" src="Content/img/remove-icon.png"/>
	</a>
</td>
</tr>
<?php endforeach ?>
</table>
</p>
