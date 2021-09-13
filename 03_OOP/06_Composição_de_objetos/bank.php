<?php

require 'src/Account.php';
require 'src/AccountHolder.php';
require 'src/CPF.php';

$primeiraConta = new Account(new AccountHolder(new CPF('645.616.546-41'), 'Nataniela Maria'));
$primeiraConta->deposita(500);
var_dump($primeiraConta);

$primeiraConta->saca(300); 
var_dump($primeiraConta);
echo $primeiraConta->getSaldo().PHP_EOL;
echo $primeiraConta->getCpfAccHolder().PHP_EOL;
echo $primeiraConta->getNameAccHolder().PHP_EOL;


$segundaConta = new Account(new AccountHolder(new CPF('698.549.548-10'), 'Lui SP'));
var_dump($segundaConta);

$new = new Account(new AccountHolder(new CPF('698.549.548-10'), 'Audrey Hep'));
echo Account::getAccountAmount();

