<?php
require_once 'Usuario.php';

class CrudDao implements UsuarioDao
{
  private $pdo;
  //recebendo a conexão
  public function __construct(PDO $cnx)
  {
    $this->pdo = $cnx;  
  }
  
  //Buscando os dados no banco de dados
  public function acharTodos()
  {
    $array = [];
    $sql = $this->pdo->query('SELECT * FROM users');
    if($sql->rowCount() > 0)
    {
      $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
      foreach($lista as $u)
      {
        $novosUsers = new Usuario();
        $novosUsers->setId($u['id']);
        $novosUsers->setNome($u['nome']);
        $novosUsers->setEmail($u['email']);
        $array[] = $novosUsers;
      }
      return $array;
    }
  }

  // Adicionado novos usuarios
  public function adicionar(Usuario $u)
  {
    $sql = $this->pdo->prepare('INSERT INTO users(nome,email) VALUES (:nome,:email)');
    $sql->bindValue(':nome',$u->getNome());
    $sql->bindValue(':email',$u->getEmail());
    $sql->execute();

    $u->setId($this->pdo->lastInsertId());
    return $u;
    
  }

  // Editando usuários no banco de dados
  public function editar(Usuario $u)
  {
    $sql = $this->pdo->prepare('UPDATE users SET nome = :nome, email = :email WHERE id = :id');
    $sql->bindValue(':id',$u->getId());
    $sql->bindValue(':nome',$u->getNome());
    $sql->bindValue(':email',$u->getEmail());
    $sql->execute();
  }

  // Verificando se o id é o mesmo
  public function acharPeloId($id)
  {
    $sql = $this->pdo->prepare('SELECT * FROM users WHERE id=:id');
    $sql->bindValue(':id',$id);
    $sql->execute();
    if($sql->rowCount() > 0)
    {
      $data = $sql->fetch();

      $u = new Usuario();
      $u->setId($data['id']);
      $u->setNome($data['nome']);
      $u->setEmail($data['email']);   

      return $u;
    }
    else
    {
      return false;
    }
  }

  //verificando se os emails são iguais
  public function acharPeloEmail($email)
  {
    $verifica = $this->pdo->prepare('SELECT*FROM users WHERE email = :email');
    $verifica->bindValue(':email',$email);
    $verifica->execute();

    if($verifica->rowCount() > 0)
    {
      $array = $verifica->fetch();
      
      $u = new Usuario();
      $u->setId($array['id']);
      $u->setNome($array['nome']);
      $u->setEmail($array['email']);

      return $u;
    }
    else
    {
      return false;
    }
  }

  // Excluindo usuário pelo id
  public function excluir($id)
  {
    $sql = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
    $sql->bindValue(':id',$id);
    $sql->execute();
  }
}