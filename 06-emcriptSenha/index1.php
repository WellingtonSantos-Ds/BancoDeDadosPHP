<?php 

$senha = '1234';

// Quando eu faco a incripiracao eu  passo dois parâmetros, o que vai ser encriptado e a constate do php que escolhe a melhor encriptação; deferente do md5 que é fixo e gera 32 carácter e pode ter o risco de duas estrigue terem o mesmo hash

// PASSWORD_DEFAULT  = Pode variar de 60 a 255 carácter
// PASSWORD_BCRYPT =  Sempre vai ser 60 carter
$hash = password_hash($senha,PASSWORD_DEFAULT);

echo 'Senha = '. $senha."<br>";
echo 'Hash = '.$hash."<br>";