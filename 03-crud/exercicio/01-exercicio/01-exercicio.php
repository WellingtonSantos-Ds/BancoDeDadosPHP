<?php
require 'confi.php';

$sql = $pdo->query('SELECT * FROM users');
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<a href="adicionar.php">ADICIONAR USUARIO</a>

<table border="1" width="100%">
  
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>AÇÕES</th>  
  </tr>    

  <?php foreach ($dados as $row):?>
    <tr>
      <td> <?php echo $row['id']; ?></td>
      <td><?php echo $row['nome']; ?></td>
      <td><?php echo $row['email']; ?></td>
    </tr>
  <?php endforeach?>

</table>