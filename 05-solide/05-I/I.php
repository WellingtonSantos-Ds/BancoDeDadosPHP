<?php
// Interface segregation principle ( Principio da segregação da interface);
// Diz que na interface só vão ter os métodos essenciais e que vão ser utilizados pela class implementadora;

interface Avis
{
  public function Location($lat,$log);
  public function altitude($alt);
  public function render();
}

class Papagaio implements Avis
{
  public function Location($lat,$log){}
  public function altitude($alt){}
  public function render(){}
}

// Violação da segregação porque pinguim não voa;
class Pinguim implements Avis
{
  public function Location($lat,$log){}
  public function altitude($alt){} // isso vai ser um método que não vai ser usado ;
  public function render(){}
}

// jeito correto

// Segregação diz divisão ou seja divisão de inter face;
interface Avis1
{
  public function Location($lat,$log);
  public function render();
}

// Vai ter tudo de Avis1 mas com mas uma ação que é (altitude);
interface AvisQueVao extends Avis1
{
  public function altitude($alt);
}

class Papagaio1 implements AvisQueVao
{
  public function Location($lat,$log){}
  public function altitude($alt){}
  public function render(){}
}


class Pinguim1 implements Avis1
{
  public function Location($lat,$log){}
  public function render(){}
}

