<?php
 
 /* o include não faz isso, pois ele é feito para a inclusão de arquivos não essenciais para o funcionamento do programa. 
    Nos casos em que estamos incluindo arquivos obrigatórios, usamos a estrutura de linguagem require:
 */
// Para incluirmos um arquivo apenas se ele não tiver sido incluído anteriormente, podemos utilizar o require_once
require_once 'funcoes.php';

$contas_w_key = [
    '123.456.789-10'=> [
        "titular" => "ana",
        "saldo"=>123
    ],
    '123.456.789-11'=>[
        "titular" => "lui",
        "saldo"=>321
    ],
    '123.256.789-12'=>[
        "titular" => "may",
        "saldo"=>18567
    ]
];


$contas_w_key['123.456.789-10'] = bankDraft($contas_w_key['123.456.789-10'] , 3);

$contas_w_key['123.456.789-11'] = bankDeposit($contas_w_key['123.456.789-11'] , 30000.546);


foreach($contas_w_key as $cpf=>$account){
    /*  Quando tentamos acessar um array associativo dentro de uma string, o PHP se confunde com a variável, o colchete e as aspas, 
        ocorrendo em um erro. Para resolvermos esse problema e exibirmos o valor de um array associativo dentro de uma string, 
        basta removermos as aspas simples:*/

    // ANTES: 
        // showMessage($cpf.": ".$account['titular']." ".$account['saldo']);
    // DEPOIS: 
        // showMessage("$cpf: $account[titular] $account[saldo]");
    // FORMA COMPLEXA: Complex (curly) syntax: https://www.php.net/manual/en/language.types.string.php
        showMessage("$cpf: {$account['titular']} {$account['saldo']}");
}
