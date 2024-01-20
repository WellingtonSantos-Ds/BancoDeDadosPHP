<?php 
// Dependency inversion principle (Principio da inversão de dependência)

class MsqlConn
{
  public function conexao(){}
}

// Desse jeito está errado porque toda vez que eu instanciar as class eu vou fazer uma nova conexão com o banco de dados;
class UsuarioDao
{
  private $db;

  public function __construct()
  {
    $this->db = new MsqlConn();
  }
}
