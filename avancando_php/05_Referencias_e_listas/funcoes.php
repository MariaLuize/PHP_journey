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

// function deleteAccount($contas_w_key array &$account)
// {
//     $contas_w_key = unset($account);
// }

// PASSAGEM POR REFERÊNCIA:& modifica o dado em memória e não uma cópia dele
function upperLetters(array &$account)
{
    $account['titular'] = mb_strtoupper($account['titular']);
}