<?php
// A manipulação de imagens no php normal mente usa uma biblioteca chamada GD2;

// Criando uma quadrado com a função. tudo criado com a biblioteca GD fica na memoria do servidor para depois da o comando de salvar etc..;
$img = imagecreatetruecolor(300,300);

// São dois parâmetro primeiro a imagem, e o segundo a cor em RGB
$cor =  imagecolorallocate($img,255,0,0);

// Preenchendo img 1-parâmetro a imagem; 2-parâmetro onde o  exo x começa; 3-parâmetro onde o exo y começa; 4-parâmetro a cor da imagem;
imagefill($img, 0, 0,$cor);

// Exibindo na tela sem assear o arquivo; exibido pelo documento que é o site; Nao posso exibir se tiver cabeçalho menu etc.. na pagina;
header("Content-Type: image/jpeg");

// Gerando a imagem; imagejpeg para dizer que é do tipo jpeg; 1-parâmetro a imagem; 2-parâmetro onde salvar se colocar null ele apenas descarrega a imagem; 3-parâmetro a qualidade da imagem que vai de 0 a 100 por padrão é 70;// imagejpeg($img,null,100);
imagejpeg($img,'imagem.jpg',100);

// A png só tem dois parâmetros;
imagejpeg($img,'imgPng.png');
