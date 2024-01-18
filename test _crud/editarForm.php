<?php
require 'config.php';
$id = filter_input(INPUT_GET,'id'); 

if($id)
{
  $sql = $conn->prepare('SELECT * FROM users WHERE id=:id');
  $sql->bindValue(':id',$id);
  $sql->execute();

  if($sql->rowCount() > 0) 
  {
    $array = $sql->fetch(PDO::FETCH_ASSOC);
  }
  else
  {
    header('Location:index.php');
  }
}
else
{
  header('Location:index.php');
}
?>

<h1> EDITAR USUARIO</h1>
<form method="post" action="editar.php">

<input type="hidden" name="id" value="<?=$array['id']?>" >

  <label>
    Nome
    <br>
    <input type="text" name="nome" value="<?=$array['nome']?>">
  </label>
  <br>
  <label>
    Email
    <br>
    <input type="email" name="email" value="<?=$array['email']?>">
  </label>
  <br><br>
  <button>Enviar</button>



