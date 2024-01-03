<?php
require 'conect.php';

$nome = filter_input(INPUT_POST,'name');
$email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

if($nome && $email)
{

  $validate = $conectaDb->prepare("SELECT * FROM users WHERE email = :email");
  $validate->bindValue(':email',$email);
  $validate->execute();
  
  if($validate->rowCount() === 0)
  {

    $sql = $conectaDb->prepare("INSERT INTO users(nome,email) VALUES (:nome,:email)");
    $sql->bindValue(':nome',$nome);
    $sql->bindValue(':email',$email);
    $sql->execute();
    header('Location:../index.php');
  }
  else
  {
    header('Location:addform.php');
  }
}
else
{
  header('Location:addfom.php');
}
