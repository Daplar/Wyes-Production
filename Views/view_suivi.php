<?php require('view_begin.php');?>
<thead>
  <tr>
    <th>Idproduct</th>
    <th>serial_number</th>
    <th>serial_number_fabrication</th>
    <th>name</th>
    <th>status</th>
    <th>fabrication_date</th>
    <th>hardware_version</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td><?=$lunette_suivi["id_prod"]?><td><?=$lunette_suivi["serial_number"]?></td><td><?=$lunette_suivi["serial_number_fabrication"]?></td><td><?=$lunette_suivi["id_prod"]?></td><td><?=$lunette_suivi["name"]?></td><td><?=$lunette_suivi["status"]?></td>
    <td><?=$lunette_suivi["fabrication_date"]?><td><?=$lunette_suivi["hardware_version"]?></td><td><?=$lunette_suivi["package_version"]?></td><td><?=$lunette_suivi["problems_history"]?></td><td><?=$lunette_suivi["actions_history"]?></td><td><?=$lunette_suivi["test_results"]?></td>
    <td><?=$lunette_suivi["test_results"]?></td>
  </tr>
</tbody>
</table>
<?php require('view_end.php');?>
