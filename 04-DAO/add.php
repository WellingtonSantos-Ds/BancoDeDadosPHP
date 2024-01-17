<?php 
require 'conexao/conexao.php';
require 'baDao/usersDaoMysql.php';

$usuarioDao = new UsersCrud($conexao);

$nome = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

if($nome && $email)
{
  if($usuarioDao-> findByEmail($email) === false )
  {
    $novoUsers = new Users();
    $novoUsers-> setNome($nome);
    $novoUsers-> setEmail($email);

    $usuarioDao->add($novoUsers);

    header('Location: index.php');
    exit;
  }
  else
  {
    header('Location: addForm.php');
    exit;
  }
}
else
{
  header('Location: addForm.php');
  exit;
}


