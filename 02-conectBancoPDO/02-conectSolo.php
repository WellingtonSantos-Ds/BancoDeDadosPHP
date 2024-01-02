<?php

$pdo = new PDO('mysql:dbname=test;host=localhost','root');

$sql = $pdo-> query('SELECT* FROM users');

$dados = $sql-> fetchAll(PDO::FETCH_ASSOC);
print_r($dados);


