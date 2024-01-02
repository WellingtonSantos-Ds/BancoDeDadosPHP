<?php
require 'config.php';

$sql = $pdo->query('SELECT * FROM usuario');
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
</table>

