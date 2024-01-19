<?php
require 'conexao.php';
require 'CrudDao.php';
$id = filter_input(INPUT_GET,'id');
$userDao = new CrudDao($conn);

if($id && $userDao->acharPeloId($id) == true)
{
  $usuario = $userDao->acharPeloId($id);
}

?>

<h1> Editar</h1>
<form method="post" action="editar.php">

<input type="hidden" name="id" value="<?=$usuario->getId()?>">

  <label>
    Nome:<br/>
    <input type="text" name="nome" value="<?=$usuario->getNome()?>"/>
  </label>
  
  <br><br>
  
  <label>
    E-mail:<br/>
    <input type="text" name="email" value="<?=$usuario->getEmail()?>"/>
  </label>
  <br>
  <br>
   <button>Enviar</button>
</form>