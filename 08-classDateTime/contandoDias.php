<?php

$hoje = new DateTime();
$falta = new DateTime('2024-12-31');

$diferenca = $hoje ->diff($falta);

// contando dias;
// echo $diferenca->format('%a dias');

// contado ano  messes e dias
echo $diferenca->format('%y anos, %m messes, %d dias %H horas, %i minutos, %s segundos');

