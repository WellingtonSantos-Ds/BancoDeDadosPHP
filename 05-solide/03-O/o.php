<?php
// Open closed principle Principio aberto fechado
// Resumindo todas classes deve estar aberta para espanação mas fechadas para modificação; 


// jeito errado 

class ContratoClt
{
  public function calcularSalario(){
    return 1500;
  }
}

class Estagio 
{
  public function bolsaAuxilio(){
    return 1000;
  }
}

class FolhaDePagamentos
{
  public function calcular($funcionario)
  {
    $salario = 0;

    if($funcionario instanceof ContratoClt)
    {
      $salario = $funcionario->calcularSalario();
    }
    elseif($funcionario instanceof Estagio)
    {
      $salario = $funcionario->bolsaAuxilio();
    }

    return $salario;
  }
}


$b = new FolhaDePagamentos();
echo  $b->calcular(new ContratoClt());


// jeito Corrento;

// Com a interface eu garanto a minha expansão fechado a modificação; 
interface Remunerado
{
  public function remuneracao();
}

class ContratoClt1 implements Remunerado
{
  public function remuneracao(){}
}

class Estagio1 implements Remunerado
{
  public function remuneracao(){}
}

// Expandindo sem presisar modifica a classe abaixo;
class CantratoPj implements Remunerado
{
  public function remuneracao(){}
}

//Não modificando a classe 
class FolhaDePagamentosddd1
{
  // Estou recebendo apenas  as classe do tipo remunerado;
  public function calcular(Remunerado $funcionario)
  {
    return $funcionario->remuneracao();
  }

}