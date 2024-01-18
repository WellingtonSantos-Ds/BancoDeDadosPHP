<?php
require 'config.php';
$nome= filter_input(INPUT_POST,'nome');
$email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

if($email && $nome)
{
  $sql = $conn->prepare('SELECT * FROM users WHERE email=:email');
  $sql->bindValue(':email',$email);
  $sql->execute();
 
  if($sql->rowCount() === 0)
  {
    $add = $conn->prepare('INSERT INTO users(nome,email) VALUES(:nome,:email)');
    $add->bindValue(':nome',$nome);
    $add->bindValue(':email',$email);
    $add->execute();
    
    header('location:index.php');
  }
  else
  {
    header('location:addForm.php');
  }  
}
else
{
  header('location:addForm.php');
}

