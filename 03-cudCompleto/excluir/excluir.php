<?php
require '../conecao/conecao.php';

$id = filter_input(INPUT_GET,'id');
if($id)
{
  $sql = $conecao->prepare('DELETE FROM usuarios WHERE id= :id');
  $sql ->bindValue(':id',$id);
  $sql->execute();
}
header('Location:../index.php');
?>