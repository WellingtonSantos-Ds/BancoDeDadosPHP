<?php

$arquivo = 'boraBora.jpg';
$maxWidth = 500;
$maxHeight = 500;

// Pegando o tamanha da imagem que esta no array passando para list que pega a primeira e a segunda posição do array;
list($originalWidth,$originalHeight) = getimagesize($arquivo);

// Pegando as proporções das imagem dividindo largura pela altura;
$raioOriginal = $originalWidth / $originalHeight;
$raioDestino = $maxWidth / $maxHeight;

 
$finalWidth = 0;
$finalHeight = 0;

if($raioDestino > $raioOriginal)
{
  // Definindo largura: altura *  a proporção;
  $finalWidth = $maxHeight * $raioOriginal;
  $finalHeight = $maxHeight;
}
else
{
  // Definindo altura: largura / pela proporção;
  $finalHeight = $maxWidth / $raioOriginal;
  $finalWidth = $maxWidth;
}

// Criando a imagem ;
$imagem = imagecreatetruecolor($finalWidth,$finalHeight);
$originalImg = imagecreatefromjpeg($arquivo);

// Pegando imagem original e jogando na imagem que estou criando: copiando imagem original; 1 a imagem que eu estou criando: 2 quem eu quero copiar: 3 ao 6 as posições relativas originais e as posições finais: 7 e 8 tamanho final que vou jogar a minha imagem: 9 e 10 qual era o tamanho original da minha imagem 
imagecopyresampled(
  $imagem, // imagem que estou criando;
  $originalImg, // imagem original 
  0, 0, 0, 0, // posições finais e posições originais x-y;
  $finalWidth,$finalHeight, // tamanho final da imagem;
  $originalWidth, $originalHeight // tamanho original; 

);

header("Content-Type: image/jpeg");
imagejpeg($imagem,'novo_boraBora.jpeg',100);