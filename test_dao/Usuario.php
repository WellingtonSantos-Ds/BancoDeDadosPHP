<?php 

class Usuario
{
  private $id;
  private $nome;
  private $email;
  
  // get set id
  public function setId($i)
  {
    $this->id = $i;
  }
  public function getId()
  {
    return $this->id;
  }

  //get set nome
  public function setNome($n)
  {
    $this->nome = $n;
  }
  public function getNome()
  {
    return $this->nome;
  }
  
  //get set email
  public function setEmail($e)
  {
    $this->email = $e;
  }
  public function getEmail()
  {
    return $this->email;
  }
}

interface UsuarioDao
{
  public function acharTodos();
  public function adicionar(Usuario $u);
  public function editar(Usuario $u);
  public function acharPeloId($id);
  public function acharPeloEmail($email);
  public function excluir($id);

}




