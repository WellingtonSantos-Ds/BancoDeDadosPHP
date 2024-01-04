<?php
require '../conecao/conecao.php';

$id = filter_input(INPUT_GET,'id');

$sql = $conecao->prepare("SELECT * FROM usuarios WHERE id= :id");
$sql->bindValue(':id',$id);
$sql->execute();

if($sql ->rowCount()>0)
{
 
  $array = $sql->fetch(PDO::FETCH_ASSOC);
}
else
{
  header('Location:../index.php');
}
?>

<h1> Editar</h1>
<form method="post" action="editar.php">

<input type="hidden" name="id" value="<?=$array['id']?>">

  <label>
    Nome:<br/>
    <input type="text" name="name" value="<?=$array['name']?>"/>
  </label>
  
  <br><br>
  
  <label>
    E-mail:<br/>
    <input type="text" name="email" value="<?=$array['email']?>"/>
  </label>
  <br>
  <br>
   <button>Adicionar</button>
</form>