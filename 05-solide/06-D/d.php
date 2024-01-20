<?php 
// Dependency inversion principle (Principio da inversão de dependência)

class MysqlConn
{
  public function conexao(){}
}

// Desse jeito está errado porque toda vez que eu instanciar as class eu vou fazer uma nova conexão com o banco de dados;
class UsuarioDao
{
  private $db;

  public function __construct()
  {
    $this->db = new MysqlConn();
  }
}


// também esta errado

class MysqlConn1
{
  public function conexao(){}
}

// Desse jeito  estou fazendo apenas uma injeção de dependência 
class UsuarioDao1
{
  private $db;

  public function __construct(MysqlConn1 $conn)
  {
    $this->db = $conn;
  }

}



// Abstração para a conexão com o banco de dados
interface DbConnection
{
  public function conexao();
}

// Implementação concreta da conexão com o banco de dados
class MsqlConn2 implements DbConnection
{
  public function conexao()
  {
      // Implementação da conexão MySQL
  }

}

class OracleConn implements DbConnection
{
  public function conexao()
  {
      // Implementação da conexão MySQL
  }
}

// Classe UsuarioDao agora depende da abstração (DbConnection)
class UsuarioDao2
{
  private $db;
  // O construtor só aceita o banco de dados que tiver implementado o DbConnection
  public function __construct(DbConnection $db)
  {
      $this->db = $db;
  }
}
$dbConn = new MsqlConn2(); 
$dbConn2 = new OracleConn(); 

$usuarioDao = new UsuarioDao2($dbConn);
$usuarioDao2 = new UsuarioDao2($dbConn);
