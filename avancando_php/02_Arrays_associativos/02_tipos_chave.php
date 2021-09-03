<?php

// o PHP só consegue trabalhar, em arrays associativos, com chaves dos tipos inteiro ou string. 
// Qualquer outro tipo diferente desses vai ser convertido para uma string ou inteiro. 
// https://www.php.net/manual/pt_BR/language.types.array.php
// https://www.php.net/manual/pt_BR/types.comparisons.php
$arr = [
    1 => 'a',
    '1' => 'b',
    1.5 => 'c',
    true => 'd',
    'qualquer_coisa' => 'Teste'
];

foreach ($arr as $item) {
    echo $item.PHP_EOL;
}