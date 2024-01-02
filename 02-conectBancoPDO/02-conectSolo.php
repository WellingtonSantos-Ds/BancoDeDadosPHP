<?php

$pdo = new PDO('mysql:dbname=test;host=localhost','root');

$sql = $pdo-> query('SELECT* FROM usuario');

$dados = $sql-> fetchAll(PDO::FETCH_ASSOC);
print_r($dados);


