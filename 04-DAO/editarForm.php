<?php
require 'conexao/conexao.php';
require 'baDao/usersDaoMysql.php';
$usuarioDao = new UsersCrud($conexao);

$usuario = false;
$id = filter_input(INPUT_GET,'id');
if($id)
{
  $usuario = $usuarioDao->findById($id);
}
if($usuario === false)
{
  header('Location:index.php'); 
  exit;
}

?>

<h1> Editar</h1>
<form method="post" action="editar.php">

<input type="hidden" name="id" value="<?=$usuario->getId()?>">

  <label>
    Nome:<br/>
    <input type="text" name="name" value="<?=$usuario->getNome()?>"/>
  </label>
  
  <br><br>
  
  <label>
    E-mail:<br/>
    <input type="text" name="email" value="<?=$usuario->getEmail()?>"/>
  </label>
  <br>
  <br>
   <button>Adicionar</button>
</form>