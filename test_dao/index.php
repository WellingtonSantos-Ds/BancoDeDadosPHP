<?php
require 'conexao.php';
require 'CrudDao.php';

// Estabelecendo a conexao;
$usuario = new CrudDao($conn);
$lista = $usuario->acharTodos();
?>

<a href="addHtml.php"><button>Adicionar</button></a>
<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>ACTION</th>
  </tr>

  <?php foreach($lista as $u):?>
    <tr>
      <td><?=$u->getId()?></td>
      <td><?= $u->getNome()?></td>
      <td><?=$u->getEmail()?></td>      
      <td>
        <a href="editarHtml.php?id=<?=$u->getId()?>"><button>Editar</button></a>
        <a href="excluir.php?id=<?=$u->getId()?>"><button>Excluir</button></a>
      </td>
    </tr>
  <?php endforeach?>
</table>