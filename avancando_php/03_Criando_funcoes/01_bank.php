<?php

function showMessage(string $message){
    echo $message.PHP_EOL;
}

/* Explicitar os tipos dos parâmetros 
    Também devemos nos atentar ao fato de a $conta precisa ser do tipo array, e teremos um erro se for passado qualquer outro tipo:
    Sempre podemos informar na função o tipo de dado que queremos receber. Além disso, podemos informar também o tipo de dado sendo retornado. 
    Para isso, depois do fechamento dos parênteses, usamos : seguidos do tipo em questão. 
*/
function bankDraft(array $account, $value): array
{
    if ($account['saldo']<$value){
        showMessage("You can't perform this procedure");
    }else{
         $account['saldo'] -= $value;
    }
    return $account;
}

function bankDeposit(array $account, $value): array
{
    if($value<0){
        showMessage("You can't perform this procedure");
    }else{
        $account['saldo'] += $value;
    }
    return $account;
}

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
    showMessage($cpf.": ".$account['titular']." ".$account['saldo']);
}
