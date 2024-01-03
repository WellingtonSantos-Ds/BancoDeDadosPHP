<?php
require 'config.php';

$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);

if ($name && $email)
{

  // Esse comando vai funcionar mas vai deixar uma falha de segurança; 
  //  $pdo->query("INSERT INTO users(nome,email) VALUES ('$name','$email')");
  // Para melhorar a segurança se usa uma etapa chamada (pdo stamen); que é mantar aos pucos a query e executar;

  // Aqui eu mando o embaso da minha query; montando um template e depois de values eu substituo por minhas variáveis;  ; 
  $sql = $pdo->prepare("INSERT INTO users(nome,email) VALUES (:nome,:email)");

  // Agora eu faco as associações para cada um dos item;
  $sql -> bindValue(':nome',$name);
  $sql -> bindValue(':email',$email);

  // posso usar $sql -> bindParam(':email',$email); a diferença é que eu posso modificá-lo em qualquer parte do meu código; diferente do (value) que recebe o valor apenas uma vez;

  // Depois de tudo eu tenho que executar meu código para funcionar;
  $sql ->execute();
  header('Location:index.php');
  exit;
  
}
else
{
  header('Location:adicionar.php');
  exit;
}