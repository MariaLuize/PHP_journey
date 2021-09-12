<?php

require 'src/Account.php';

/* A palavra new é utilizada para criar um objeto, e devolve o endereço dele
    Este endereço é armazenado em uma variável, e através desta variável podemos acessar o objeto e seus atributos
*/

// $firstAccount é uma refererncia a um objeto de Account!
$firstAccount = new Account();


/*  No PHP, para acessarmos um atributo a partir de um objeto usamos uma "seta", representada por ->, como em $primeiraConta->saldo. 
    Em CSS, isso significa o acesso a um ponteiro. Já no PHP, estamos acessando, dentre outras possibilidades, 
    um atributo do objeto de determinado tipo. Podemos, por exemplo, informar $primeiraConta->saldo = 200.
*/
$firstAccount -> cpfTitular =  '456781-12';
$firstAccount -> nomeTitular =  'May';
$firstAccount -> saldoTitular =  456781.12;
var_dump($firstAccount);

// echo $firstAccount; Fatal error: Uncaught Error: Object of class Account could not be converted to string

$secondAccount = new Account();
$secondAccount->cpfTitular = '987.654.321-10';
$secondAccount->nomeTitular = 'Patricia';
$secondAccount->saldoTitular = 1500;
var_dump($secondAccount);

$thirdAccount = $firstAccount;
// var_dump($thirdAccount);

// Acessando o método sacar da classe Account
$secondAccount->sacar(100023.454);
// var_dump($secondAccount);

$secondAccount->depositar(456444000);
var_dump($secondAccount->saldoTitular);

$contaUm = new Account();
$contaDois = new Account();
$contaUm->depositar(500);

$contaUm->transfer(200, $contaDois);
echo $contaUm->saldoTitular;
var_dump($contaUm);
var_dump($contaDois);