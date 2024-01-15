<?php
require 'conecao/conecao.php';
require 'baDao/usersDaoMysql.php';

$usuarioDao = new UsersDaoMysql($conecao);
$lista = $usuarioDao -> findAll();
?>

<a href="add.php"><button>Adicionar</button></a>
<br>
<br>

<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
  </tr>
  <?php foreach ($lista as $us):?>
    <tr>
    <td><?= $us->getId()?></td>
    <td><?= $us->getNome()?></td>
    <td><?= $us->getEmail()?></td>
  </tr>
  <?php endforeach;?>
</table>