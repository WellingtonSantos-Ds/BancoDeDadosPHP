<?php
require 'config.php';

$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);

if ($name && $email)
{
  // Verificando se tem dois emails iguais ;
  $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $sql ->bindValue(':email',$email);
  $sql -> execute();
  // Se for mair que 0 eu exibo;
  if($sql->rowCount() === 0)
  {

    $sql = $pdo->prepare("INSERT INTO users(nome,email) VALUES (:nome,:email)");
    $sql -> bindValue(':nome',$name);
    $sql -> bindValue(':email',$email);
    $sql ->execute();
    header('Location:index.php');
    exit;
  }
  else
  {
    header('Location:adicionar.php');
    exit;
  }    
}
else
{
  header('Location:adicionar.php');
  exit;
}