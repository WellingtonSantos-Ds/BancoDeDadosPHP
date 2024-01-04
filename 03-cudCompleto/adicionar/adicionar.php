<?php
require '../conecao/conecao.php';

$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

if($name&&$email)
{
  $sql = $conecao->prepare("SELECT * FROM usuarios WHERE email= :email");
  $sql ->bindValue(':email',$email);
  $sql ->execute();
  
  header('Location:../index.php');

}
else
{
  header('Location:adicionarHtml.php');
}

if($sql->rowCount()=== 0)
{
  $add = $conecao->prepare("INSERT INTO usuarios(name,email) VALUES (:name,:email)");
  $add->bindValue(':name',$name);
  $add->bindValue(':email',$email);
  $add->execute();
}
else
{
  header('Location:adicionarHtml.php');
}
?>