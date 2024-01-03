<?php
require 'conecao.php';

$sql = $conecao->query("SELECT * FROM usuarios");
$consulta = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>CONSULTANDO BANCO  DE DADOS </h1>

<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>E-MAIL</th>
    <th>ACTION</th>  
  </tr>

  <?php foreach($consulta as $lista) :?>
    <tr>
      <td><?=$lista['id']?></td>
      <td><?=$lista['name']?></td>
      <td><?=$lista['email']?></td>
      <td>
        <a href="editar.php"><button>Editar</button></a>
        <a href="excluir.php"><button>Excluir</button></a>
      </td>
    </tr>
  <?php endforeach?>

</table>



