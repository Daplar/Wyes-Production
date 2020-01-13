<?php require('view_begin.php');?>

<p>
<table>
  <thead>
  <th> Id Produit </th>
  <th> Numéro de série </th>
  <th> Numéro de série de fabrication </th>
  <th> Nom </th>
  <th> Status </th>
  <th> Date de fabrication </th>
  <th> Version Mécanique </th>
  <th> Version Électronique </th>
  <th> Version Logiciel </th>
  <th> Historique de Problèmes </th>
  <th> Historique d'actions </th>
  <th> Tests </th>
  </thead>
  <tbody>
    <?php foreach ($lunette_suivi as $key => $value) {
      echo('<tr>');
      foreach ($value as $k => $v) {
        echo ('<td>'.$value[$k].'</td>');
      }
      echo ('</tr>');
    }?>
  </tbody>
</table>
</p>
<?php require('view_end.php');?>
