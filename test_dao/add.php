<?php
require 'conexao.php';
require 'CrudDao.php';

$conDao = new CrudDao($conn);

$nome = filter_input(INPUT_POST,'nome');
$email = filter_input(INPUT_POST,'email');

if($nome && $email && $conDao->acharPeloEmail($email) == false)
{
  $usuario = new Usuario();
  $usuario->setNome($nome);
  $usuario->setEmail($email);

  $conDao->adicionar($usuario);

  header('Location:index.php');
  exit;
}
else
{
  header('Location:addHtml.php');
  exit;
}