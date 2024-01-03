<?php
require './bncoDB/conect.php';
$sql = $conectaDb->query("SELECT * FROM users");
$mostra = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<a href="./bncoDB/addform.php"><button>ADICIONAR</button></a>
<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>AÇÕES</th>
  </tr>

  <?php foreach($mostra as $users):?>
    <tr>
      <td><?php echo $users['id']?></td>
      <td><?php echo $users['nome']?></td>
      <td><?php echo $users['email']?></td>
      <td>
        <a href="./bncoDB/editar.php?id=<?=$users['id']?>"><button>EDITAR</button></a>
        <a href="nada.php?id=<?=$users['id']?>"><BUtton>DELETAR</BUtton></a>
      </td>
    </tr>
    <?php endforeach?>
</table>
