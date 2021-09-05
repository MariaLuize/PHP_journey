<?php
//  arrays associativos são equivalestes a dicionários
// a estrutura é:
// $varArrayAssociativo = [
//     "key1" => value1,
//     key2=>"value2"
// ];

$conta1 = [
    "titular" => "ana",
    "saldo"=>123
];

$conta2 = [
    "titular" => "lui",
    "saldo"=>321
];

$conta3 = [
    "titular" => "may",
    "saldo"=>18567
];

$contas = [$conta1,$conta2,$conta3];
$contas_w_key = [
    123456=> [
        "titular" => "ana",
        "saldo"=>123
    ],
    654321=>[
        "titular" => "lui",
        "saldo"=>321
    ],
    456789=>[
        "titular" => "may",
        "saldo"=>18567
    ]
];

// for($i =0;$i<count($contas);$i++){
//     echo $contas[$i]["titular"].PHP_EOL;
// }

// USANDO FOREACH:NÃO PRECISA SABER O INDICE
// foreach($contas as $conta_particular){
//     echo $conta_particular["titular"].PHP_EOL;

// }
 
// ADICIONANDO VALORES
$contas_w_key[456987]=[
    'titular' => 'Gael',
    'saldo' =>73333
];

// ADICIONANDO VALORES AO FINAL DO ARRAY
// Lu ficou com o numero de cpf em uma unidade maior do que o maior numero de cpf do array
// até então
$contas_w_key[]=[
    'titular' => 'Lu',
    'saldo' =>103333
];


foreach($contas_w_key as $cpf => $conta_particular){
    echo $cpf." ".$conta_particular["titular"]." ".$conta_particular["saldo"].PHP_EOL;
}


