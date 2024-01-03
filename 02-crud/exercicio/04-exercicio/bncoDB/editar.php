<?php

require 'conect.php';

$id = filter_input(INPUT_GET,'id');

$array=[];

$sql = $conectaDb->prepare("SELECT * FROM users WHERE id = :id");
$sql->bindValue(':id',$id);
$sql->execute();
if($sql->rowCount() > 0)
{
  $array = $sql->fetch(PDO::FETCH_ASSOC);
  print_r($array);
}
else
{
  header('Location:../index.php');
} 

?>

<h1> Editar Usuário EX04 </h1>

<form method="post" action="in.php">
  <label>
    Nome:<br/>
    <input type="text" name="name" value="<?=$array['nome'];?> "/>
  </label>
  
  <br><br>
  
  <label>
    E-mail:<br/>
    <input type="text" name="email" value="<?=$array['email'];?>"/>
  </label>
  <br>
  <br>
   <button>Adicionar</button>
</form>