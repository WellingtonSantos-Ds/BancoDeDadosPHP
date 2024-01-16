<?php
require 'modls/users.php';

class UsersCrud implements UsersDao
{   
  private $pdo;

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

  public function fidById()
  {

  }
  public function add(Users $u)
  {

  }
  public function update(Users $u)
  {

  }
  public function delete($id)
  {

  }
}