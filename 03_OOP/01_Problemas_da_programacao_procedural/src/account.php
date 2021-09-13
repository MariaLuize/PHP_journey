<?php

function createAccount( string $cpf, string $titular, float $saldo)
{
    return[
        $cpf => [
            'name_titular' => $titular,
            'amount_saldo'        => $saldo,
        ]
    ];
};