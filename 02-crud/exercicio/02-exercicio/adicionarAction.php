<?php
require 'config.php';

$nome = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

if ($nome && $email)
{
  $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $sql->bindValue(':email',$email);
  $sql->execute();
  
  if($sql->rowCount()===0)
  {
    $com = $pdo ->prepare("INSERT INTO users(nome,email) VALUES (:nome,:email)");
    $com->bindValue(':nome',$nome);
    $com->bindValue(':email',$email);
    $com->execute();
    header('Location:index.php');
  }
  else
  {
    header('Location:adicionarForm.php');
  }
}
else
{
  header('Location:adicionarForm.php');
}

