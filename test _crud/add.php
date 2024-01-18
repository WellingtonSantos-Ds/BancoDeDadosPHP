<?php
require 'config.php';
$nome= filter_input(INPUT_POST,'nome');
$email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

if($email && $nome)
{
  
  $sql = $conn->prepare('INSERT INTO users(nome,email) VALUES(:nome,:email)');
  $sql->bindValue(':nome',$nome);
  $sql->bindValue(':email',$email);
  $sql->execute();

}
else
{
  header('location:addForm.php');
}

