<?php
// Liskov substitution principle (Principio de substituição de Lskov); 
// Diz que tenho as mesmas funcionalidades da class estendida mas eu não posso retornar tipos diferentes;

// jeito incorreto

class C
{
  public function getNome()
  {
    return 'Meu nome é C';
  }
}


class D extends C 
{
  // Desse jeito vai funcionar mais Esse retorno fere os princípios de Liskov  
  public function getNome()
  {
    return 30;
  }
}

// Essa função funciona sem ser do tipo de (D) porque (D) é uma class fidedigna.  uma extensão de (A) ou seja todos os metodos que (A) tem (B) também pode ter; mas eu não posso retornar tipos diferentes;  
function mostra1(C $bj){
    return $bj->getNome();
}

$obijeto1 = new C();
$obijeto2 = new D();
echo mostra1($obijeto1)."<br>";
echo mostra1($obijeto2)."<br>";



// jeito correto
class A
{
  public function getNome()
  {
    return 'Meu nome é A';
  }
}

// class fidedigna 
class B extends A 
{
  // Esse retorno está correto porque estou retornado do tipo string   ;
  public function getNome()
  {
    return 'Meu nome é B';
  }
}

function mostra(A $bj){
    return $bj->getNome();
}

$obij1 = new A();
$obij2 = new B();

echo mostra($obij1)."<br>";
echo mostra($obij2)."<br>";
