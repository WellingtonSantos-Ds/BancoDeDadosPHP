<?php 
require 'conexao.php';
require 'CrudDao.php';

$id = filter_input(INPUT_POST,'id');
$nome = filter_input(INPUT_POST,'nome');
$email = filter_input(INPUT_POST,'email');
$userDao = new CrudDao($conn);

if($id)
{
  $novoUser = new Usuario();
  $novoUser->setId($id);
  $novoUser->setNome($nome);
  $novoUser->setEmail($email);
  
  $userDao->editar($novoUser);

   header('Location:index.php');
}
else
{
  header('Location:editarHtml.php');
}
