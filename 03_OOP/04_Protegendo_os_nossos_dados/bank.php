<?php

require 'src/Account.php';

$primeiraConta = new Account();
$primeiraConta->deposita(500);
var_dump($primeiraConta);

$primeiraConta->saca(300); 
var_dump($primeiraConta);

$primeiraConta->setCpfTitular('123.456.789-10');
$primeiraConta->setNomeTitular('Lui');

echo $primeiraConta->getSaldo().PHP_EOL;
echo $primeiraConta->getCpfTitular().PHP_EOL;
echo $primeiraConta->getNomeTitular().PHP_EOL;