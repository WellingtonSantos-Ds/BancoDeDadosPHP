<?php
require 'config.php';

$sql = $pdo->query('SELECT * FROM users');
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

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
</table>

