<?php
require 'config.php';

$sql = $conn->query('SELECT*FROM users');
$lista = $sql->fetchAll(PDO:: FETCH_ASSOC);

?>
<h1 style="text-align: center;">TABELA</h1>
<a href="addForm.php"><button>ADICIONAR</button></a>
<hr>
<br>

<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>ACOES</th>
  </tr>
  
  <?php foreach($lista as  $array ):?>
  
    <tr>
      <td><?=$array['id']?></td>
      <td><?=$array['nome']?></td>
      <td><?=$array['email']?></td>
      <td>
        <a href="editarForm.php?id=<?=$array['id']?>">[Edirtar]</a>
        <a href="apagar.php?id=<?=$array['id']?>">[Apagar]</a>
      </td>
    </tr>
  <?php endforeach?>
</table>