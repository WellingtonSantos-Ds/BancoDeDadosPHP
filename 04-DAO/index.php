<?php
require_once 'conecao/conecao.php';
require_once 'baDao/usersDaoMysql.php';

$crudMostra = new UsersCrud($conecao);
$list = $crudMostra->fidAll();
?>

<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
  </tr>
  <?php foreach($list as $u):?>
    <tr>
      <td><?=$u->getId()?></td>
      <td><?=$u->getNome()?></td>
      <td><?=$u->getEmail()?></td>
      </tr>
  <?php endforeach?> 
</table>