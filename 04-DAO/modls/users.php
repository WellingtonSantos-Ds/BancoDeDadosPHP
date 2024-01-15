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
  public function setId($i)
  {
    $this->id = trim($i);
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


interface UsersDao
{
  public function findAll();
  public function findById($id);
  public function add (Users $u);
  public function update(Users $u);
  public function delete($id);
}