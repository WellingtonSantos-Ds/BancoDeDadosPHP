<?php
require_once 'modls/users.php';
class UsersDaoMysql implements  UsersDao
{
  private $pdo;

  public function __construct(PDO $driver)
  {
    $this->pdo = $driver;
  }

  public function findAll()
  {
    $array = [];
    $sql = $this->pdo->query("SELECT * FROM users");
    if($sql-> rowCount() > 0){
      $data = $sql-> fetchAll(PDO::FETCH_ASSOC);
      echo "<pre>";
      print_r($data);
      foreach($data as $item)
      {
        $u = new Users();
        $u->setId($item['id']);
        $u->setNome($item['nome']);
        $u->setEmail($item['email']);

        $array[] = $u;
      }
      print_r($array);
    }
    return $array;
  }
  public function findById($id)
  {

  }
  public function add (Users $u)
  {

  }
  public function update(Users $u)
  {

  }
  public function delete($id){

  }
}