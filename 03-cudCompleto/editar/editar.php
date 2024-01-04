<?php
require '../conecao/conecao.php';

$id = filter_input(INPUT_POST,'id');
$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

if($id&&$name&&$email)
{
  $editar = $conecao->prepare("UPDATE usuarios SET name= :name, email= :email WHERE id= :id");
  $editar->bindValue(':id',$id);
  $editar->bindValue(':name',$name);
  $editar->bindValue(':email',$email);
  $editar->execute(); 
}
header('Location:../index.php');

?>