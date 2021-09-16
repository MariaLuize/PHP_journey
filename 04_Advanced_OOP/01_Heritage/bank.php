<?php

require_once 'src/Account.php';
require_once 'src/Address.php';
require_once 'src/Person.php';
require_once 'src/Employee.php';
require_once 'src/AccountHolder.php';
require_once 'src/CPF.php';

$cpf            = new CPF('645.616.546-41');
$address        = new Address('BEL','sacramenta','alferes', '330');
$titular        = new AccountHolder($cpf, 'Nataniela Maria', $address);
$funcionario    = new Employee($cpf, 'Luize Maria', 'Dev e Geo');
var_dump($titular);
var_dump($funcionario);

// $primeiraConta  = new Account($titular);
// $primeiraConta->deposita(500);

// $primeiraConta->saca(300); 
// var_dump($primeiraConta);
// echo $primeiraConta->getSaldo().PHP_EOL;
// echo $primeiraConta->getCpfAccHolder().PHP_EOL;
// echo $primeiraConta->getNameAccHolder().PHP_EOL;


// $segundaConta = new Account(new AccountHolder(new CPF('698.549.548-10'), 'Lui SP', $address));
// var_dump($segundaConta);
// $new_address = new Address('LEB','peri','A', '179');
// $new = new Account(new AccountHolder(new CPF('698.549.548-10'), 'Audrey Hep', $new_address));
// echo Account::getAccountAmount();

