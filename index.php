<?php

include('Math/BigInteger.php');

/* 
    Autor: Samael Pereira Simões
    Data inicio e fim: 29/11/2019 - 27/11/2019 

    Desafio de lógica:
    Multiplicar os números primos entre 1 e 1000.
    
    Exemplo: 1 * 2 * 3 * 5 * 7 * 11 * 13 * ... 
    OBS: Conforme tabela numeros primos 1 a 1000 http://www.hypatiamat.com/apoiopdf/numerosprimosate1000-hypatiamat.pdf inicia 2 >
        
    Hash MD5 do resultado:
    4e28dff778c215668ed3ad5e045213a6
    
    OBS: Este exercicio foi rodado em php 7
*/

function is_prime(int $numPrime): bool {
    /* TO DO
        verifica se o número é primo
        eu poderia ter utilizado a função gmp_prob_prime() mas eu não quis para forçar a lógica...
    */
    $count = 0;
    if ($numPrime != 1) {
        for ( $i = 2; $i <= $numPrime; $i++) {
            if ($numPrime%$i==0) {
                if (++$count>1)
                    return false;
            }
        }
        return true;
    } else {
        return false;
    }
}

function prime_multiply(int $n): string {
    // multiplicar primos
    $listNumbers = array();
    foreach (range(1, $n) as $number) {
        if (is_prime($number)) { 
            array_push($listNumbers, $number);
        }
    }

    
    $valueEnd = 1;
    foreach ($listNumbers as $number) {        
        // gmp_mul() é da biblioteca BigInteger
        $valueEnd = gmp_mul($valueEnd, $number);        
    }
        
    return $valueEnd;
}
    // Iniciando o valor

echo md5(prime_multiply(1000));
?>