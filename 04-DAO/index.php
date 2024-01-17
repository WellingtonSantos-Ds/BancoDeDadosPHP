<?php
require 'conexao/conexao.php';
require 'baDao/usersDaoMysql.php';

// Estou mandado para o construtor lá do (baDao) uma instancia de (new PDO) isso se chama injeção de dependência;  
$usuarioDao = new UsersCrud($conexao);

//fidAll me retorna um arry de objeto;
$list = $usuarioDao->fidAll();

?>
<a href="addForm.php"><button>Adicionar</button></a>
<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>ACTION</th>
  </tr>
  <?php foreach($list as $u):?>
    <tr>
      <td><?=$u->getId()?></td>
      <td><?=$u->getNome()?></td>
      <td><?=$u->getEmail()?></td>
      <td>
        <a href="editarForm.php?id=<?=$u->getId()?>"><button>Editar</button></a>
        <a href="excluir.php?id=<?=$u->getId()?>"><button>Excluir</button></a>
      </td>
    </tr>
  <?php endforeach?> 
</table>