<?php
require 'config.php';
$lista=[];
$sql = $pdo->query('SELECT * FROM users');

if($sql->rowCount() > 0)
{
 $lista = $sql->fetchAll(PDO::FETCH_ASSOC); 
}

?>

<a href="adicionar.php"><button>ADICIONAR USUARIO</button></a>
<br>
<br>

<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>AÇÕES</th>  
  </tr>

  <?php foreach($lista as $array) :?>    
    <tr> 
      <td> <?=$array['id']?> </td>
      <td> <?=$array['nome']?> </td>
      <td> <?=$array['email']?></td>
      <td>
        <a href="editar.php?id=<?=$array['id']?>"><button> Editar </button></a>
        <a href="excluir.php?id=<?=$array['id']?>"><button> Excluir </button></a>
      </td>
    </tr>
  <?php endforeach?>
</table>

