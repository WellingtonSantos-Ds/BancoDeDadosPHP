<?php
require 'config.php';

$info=[];

$id = filter_input(INPUT_GET,'id');

$sql = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$sql->bindValue(':id',$id);
$sql->execute();

if($sql->rowCount() > 0)
{
  $info = $sql->fetch(PDO::FETCH_ASSOC);

}
else
{
  header('Location:index.php');
}

?>

<h1> EDITAR USÚARIO</h1>
<form method="post" action="editar_action.php">
  <label>
    Nome:<br/>
    <input type="text" name="name" value="<?=$info['nome']?>"/>
  </label>
  
  <br><br>
  
  <label>
    E-mail:<br/>
    <input type="text" name="email" value="<?=$info['email']?>"/>
  </label>
  <br>
  <br>
   <button>SALVAR</button>
</form>