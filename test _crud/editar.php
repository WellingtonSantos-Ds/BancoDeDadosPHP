<?php
require 'config.php';
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

if($id && $email && $nome)
{
  //verificando email   
   
  $em = $conn->prepare('SELECT * FROM users WHERE email=:email');
  $em->bindValue(':email',$email);
  $em->execute();

 

  if($em->rowCount() === 0)
  {
    $editar = $conn->prepare('UPDATE users SET nome=:nome, email=:email WHERE id=:id');
    $editar->bindValue(':nome',$nome);
    $editar->bindValue(':email',$email);
    $editar->bindValue(':id',$id);
    $editar->execute();
  }
  else
  {
    //editando nome;
    $editar = $conn->prepare('UPDATE users SET nome=:nome WHERE id=:id');
    $editar->bindValue(':nome',$nome);
    $editar->bindValue(':id',$id);
    $editar->execute();
  }  
   

}
header('location:index.php');
