 <?php
 
 class Users
 {
  private $id;
  private $nome;
  private $email;

  public function getId()
  {
    return $this->id;
  }
  public function setId(int $i)
  {
    $this-> id = trim($i);
  }

  public function getNome()
  {
    return $this->nome;
  }
  public function setNome($n)
  {
    $this->nome = ucwords($n); 
  }

  public function getEmail()
  {
    return $this->email;
  }
  public function setEmail($e)
  {
    $this->email = strtolower(trim($e));
  }

 }

interface UsersDao{
  public function fidAll();
  public function update(Users $up);
  public function add(Users $u);
  public function findByEmail($email);
  public function findById($id);
  public function delete($id);
}
