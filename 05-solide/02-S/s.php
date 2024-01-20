<?php 
// Single responsibility principle

// Diz que toda classe deve ter 1 e somente um motivo para mudar
// Resumindo uma classe deve ter só mente uma responsabilidade cada responsabilidade ten que ser separada 


class Usuario
{
//Essa classe inflige o principio porque ela faz duas coisas;
// Associação a classe Deus porque faz varias coisas em uma classe só:
  public function setNome(){}
  public function getNome(){}

  public function add(){}
  public function update(){}
  public function delete(){}

}

// Assim esta correto;
class Usuario1
{  
  public function setNome(){}
  public function getNome(){}

}

class UsuarioDb
{
  public function add(Usuario $u){}
  public function update(Usuario $u){}
  public function delete($id){}

}