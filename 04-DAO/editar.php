<?php
require 'conexao/conexao.php';
require 'baDao/usersDaoMysql.php';

$usuarioDao = new UsersCrud($conexao);

$id = filter_input(INPUT_POST,'id');
$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

if($id && $name && $email)
{
  // Pode ser assim  $usuario = $usuarioDao->findById($id); ou do jeito abaixo que é melhor porque evita mas uma consulta no banco de dados;
  
  $usuario = new Users();
  $usuario->setId($id);
  $usuario->setNome($name);
  $usuario->setEmail($email);

  $usuarioDao->update($usuario);

  header('Location:index.php'); 
}
else
{
  header('Location:editarForm.php?id='.$id);
  exit;
}

?>