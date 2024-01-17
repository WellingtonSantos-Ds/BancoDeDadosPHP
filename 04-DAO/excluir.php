<?php
require 'conexao/conexao.php';
require 'baDao/usersDaoMysql.php';

$usuarioDao = new UsersCrud($conexao);

$id = filter_input(INPUT_GET,'id');

if($id)
{
  $usuarioDao->delete($id);
}
header('Location: index.php');