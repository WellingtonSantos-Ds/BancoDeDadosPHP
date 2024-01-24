<?php
$arquivo = 'boraBora.jpg';
$width = 300;
$height = 300;


list($originalWidth,$originalHeight) = getimagesize($arquivo);


$raioOriginal = $originalWidth / $originalHeight;
$raioDestino = $width / $height;

 
$finalWidth = 0;
$finalHeight = 0;

if($raioDestino > $raioOriginal)
{
 
  $finalWidth = $height * $raioOriginal;
  $finalHeight = $height;
}
else
{
  
  $finalHeight = $width / $raioOriginal;
  $finalWidth = $width;
}

// Novo
$finalX = 0;
$finalY = 0;
// Se o finalWidth nao for finalHeight é;
if($finalWidth < $width)
{
  $finalWidth = $width;
  $finalHeight = $width / $raioOriginal;

  // mexendo na altura;
  $finalX = -(($finalHeight - $height)/2);
} 
else
{
  $finalHeight = $height;
  $finalWidth = $height * $raioOriginal;
  
  //mexendo na na largura da imagem;
  $finalX = -(($finalWidth - $width) / 2);


}

$imagem = imagecreatetruecolor($width,$height);
$originalImg = imagecreatefromjpeg($arquivo);


imagecopyresampled(
  $imagem, 
  $originalImg, 
  $finalX, $finalY, 0, 0, 
  $finalWidth,$finalHeight,
  $originalWidth, $originalHeight 

);

header("Content-Type: image/jpeg");
imagejpeg($imagem,null,100);