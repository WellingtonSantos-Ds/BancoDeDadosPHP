<?php
function calcularNotasEMoedasRecursiva($valor, $notas100 = 0, $notas50 = 0, $moedas1 = 0)
{
    $maiorValor = max(100, 50, 1);

    if ($valor >= $maiorValor) {
        $qtdNotasOuMoedas = floor($valor / $maiorValor);
        $valor -= $qtdNotasOuMoedas * $maiorValor;

        $notas100 += ($maiorValor == 100) ? $qtdNotasOuMoedas : 0;
        $notas50 += ($maiorValor == 50) ? $qtdNotasOuMoedas : 0;
        $moedas1 += ($maiorValor == 1) ? $qtdNotasOuMoedas : 0;
    }

    return ($valor >= 1) ? calcularNotasEMoedasRecursiva($valor, $notas100, $notas50, $moedas1) : [$notas100, $notas50, $moedas1];
}

$valorTotal = 39023;
$resultado = calcularNotasEMoedasRecursiva($valorTotal);

echo $resultado[0] . ' Notas De R$100' . "<br>";
echo $resultado[1] . ' Notas De R$50' . "<br>";
echo $resultado[2] . ' Moedas De R$1' . "<br>";
