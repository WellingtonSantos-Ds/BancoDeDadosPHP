<?php
require 'conexao.php';
require 'CrudDao.php';
 
$id = filter_input(INPUT_GET,'id');
$userDao = new CrudDao($conn);

if($id  && $userDao->acharPeloId($id) == true)
{
  $userDao->excluir($id);
}
header('Location:index.php');
exit;