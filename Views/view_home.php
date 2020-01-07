<?php require('view_begin.php');?>
<h1>Test view home</h1>
<div class="overview">
  <table>
    <?php foreach ($tab as $cle => $ligne): ?>
      <tr><td><?=$cle?></td><td><?=$ligne?></td></tr>
  </table>
</div>
<?php require('view_end.php');?>
