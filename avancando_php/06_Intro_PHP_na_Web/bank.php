<?php
 
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
        "titular" => "mây",
        "saldo"=>18567
    ],
    '123.256.719-02'=>[
        "titular" => "gil",
        "saldo"=>8467
    ]
];


$contas_w_key['123.456.789-10'] = bankDraft($contas_w_key['123.456.789-10'] , 3);

$contas_w_key['123.456.789-11'] = bankDeposit($contas_w_key['123.456.789-11'] , 30000.546);

unset($contas_w_key['123.256.719-02']);

// PASSAGEM POR REFERÊNCIA
upperLetters($contas_w_key['123.256.789-12']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Bank accounts</h1>
    <?php foreach($contas_w_key as $cpf=> $account){ 
        ['titular'=>$var_titular, 'saldo'=>$var_saldo] = $account; ?>
        <dt>
            <h3> Tilular:<?=  $var_titular; ?> - CPF:<?= $cpf?> </h3>
        </dt>
        <dd>
            Saldo:<?=  $var_saldo; ?>
        </dd>
    <?php } ?>    
    


    </body>
</html>