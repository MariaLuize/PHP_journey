<?php

require 'src/Account.php';

$primeiraConta = new Account('6456165461', 'Nataniela Maria');
$primeiraConta->deposita(500);
var_dump($primeiraConta);

$primeiraConta->saca(300); 
var_dump($primeiraConta);
echo $primeiraConta->getSaldo().PHP_EOL;
echo $primeiraConta->getCpfTitular().PHP_EOL;
echo $primeiraConta->getNomeTitular().PHP_EOL;


$segundaConta = new Account('698.549.548-10', 'Lui SP');
var_dump($segundaConta);

new Account('698.549.548-10', 'Audrey Hep');
echo Account::getAccountAmount();

