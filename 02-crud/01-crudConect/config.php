<?php

$db_name = 'test';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

//Conectando ao banco de dados;
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_name,$db_pass);
