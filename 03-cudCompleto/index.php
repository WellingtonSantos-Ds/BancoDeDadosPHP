<?php
require './conecao/conecao.php';

// Lendo bando de dados 
$sql = $conecao->query("SELECT * FROM usuarios");
$consulta = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>CONSULTANDO BANCO  DE DADOS </h1>
<a href="./adicionar/adicionar.php"><button>Adicionar</button></a><br><br>
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
        <a href="./editar/editarHtml.php?id=<?=$lista['id']?>"><button>Editar</button></a>
        <a href="./excluir/excluir.php?id=<?=$lista['id']?>"><button>Excluir</button></a>
      </td>
    </tr>
  <?php endforeach?>

</table>



