<?php


$senha = '1234';
// A coda  novo lopin vai ter um hash diferente que liga na mesma senha ;
$hash = '$2y$10$QjFHpXgd8NNi5Lw3OmflsudfCWUemrEZdvTzdIVgRbNIv0.HRohNS';
$hash2 = '$2y$10$zx5ktEeFwDHXbchtMM22ke7IncsC1q5eFBId8xtyrXAioCaPhov0a';

echo password_verify($senha,$hash2)."<br>";

if(password_verify($senha,$hash2))
{
  echo 'senha correta'."<br>"; 
}
else
{
  echo 'senha incorreta'."<br>" ;
}


// Gerando com md5 mas não é o recomendado ;
$senha1 = '123';
$hash1 = md5($senha1);

$vrifica = "202cb962ac59075b964b07152d234b70";

// Como Verifica  com med5 ;

if(md5($senha1) === $vrifica)
{
  echo 'senha correta'."<br>"; 
}
else
{
  echo 'senha incorreta'."<br>" ;
}