<?php
// O PDO é uma biblioteca do php para conectar com alguns bancos de dados, Detre eles está o mysql;

// 1 banco de dados utilizado, 2 nome da tabela, 3 endereço do banco de dados, 4 usuário, 5 senha.
$pdo = new PDO("mysql:dbname=test;host=localhost","root","");

// Instanciando o PDO com o query, Que pode buscar , adicionar etc..  
$sql = $pdo->query('SELECT * FROM users');

// Contando numero de registro;
echo 'TOTAL = '.$sql->rowCount();

// o fetchAll eu estou pegando todos os dados da tabela usuário, os parâmetros é para aparecer apenas um dado;
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($dados);