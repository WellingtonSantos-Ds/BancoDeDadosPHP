<?php
require_once 'modls/users.php';

class UsersCrud implements UsersDao
{   
  private $pdo;
  // Eu vou atribuir a pdo uma instancia do tipo PDO através do construtor ;
  public function __construct(PDO $drive)
  {
    $this->pdo = $drive;
  } 

  public function fidAll()
  {
    $array = [];
    $sql= $this->pdo->query("SELECT * FROM users");
    if($sql->rowCount() > 0)
    {
      $data = $sql->fetchAll(PDO::FETCH_ASSOC);
      foreach($data as $item)
      {
        $u = new Users();
        $u->setId($item['id']);
        $u->setNome($item['nome']);
        $u ->setEmail($item['email']);

        $array[] = $u;
      }
      return $array;
    }
  }

  public function findByEmail($email){
    
    $sql = $this->pdo->prepare("SELECT*FROM users WHERE email = :email");
    $sql-> bindValue(':email',$email);
    $sql-> execute();

    if($sql-> rowCount() > 0)
    {
      $data = $sql ->fetch();

      $u = new Users();
      $u-> setId($data['id']);
      $u-> setNome($data['nome']);
      $u-> setEmail($data['email']);
      
      return $u;
    }
    else
    {
      return false;
    }
  }
  
  public function add(Users $u)
  {
    $sql = $this-> pdo-> prepare("INSERT INTO users(nome,email) VALUES (:nome,:email)");
    $sql-> bindValue(':nome',$u-> getNome());
    $sql-> bindValue(':email',$u-> getEmail());
    $sql-> execute();
    
    $u->setId($this-> pdo-> lastInsertId());
    return $u;
  }

  public function findById()
  {

  }
  
  public function update(Users $up)
  {
    
  }
  public function delete($id)
  {
    
  }
}