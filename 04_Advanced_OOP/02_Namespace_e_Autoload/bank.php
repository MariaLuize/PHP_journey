<?php

/*  Através de um autoloader com o PHP (spl_autoload_register) podemos evitar ficar utilizando 
    require para incluir todos os arquivos necessários para executar o programa; */
require_once 'autoload.php';

// Pra poder usar só new Class
/*  Se precisamos "importar" (com use) mais de uma classe do mesmo namespace, 
    podemos fazer na mesma linha, envolvendo os nomes das classes em chaves.*/
// https://www.php.net/manual/en/language.namespaces.php
use Alura\Bank\Model\{Person, CPF, Address, Employee};
use Alura\Bank\Model\Account\{AccountHolder, Account};

$cpf            = new CPF('645.616.546-41');
$address        = new Address('BEL','sacramenta','alferes', '330');
$titular        = new AccountHolder($cpf, 'Nataniela Maria', $address);
$funcionario    = new Employee($cpf, 'Luize Maria', 'Dev e Geo');
var_dump($titular);
var_dump($funcionario);

$primeiraConta  = new Account($titular);
$primeiraConta->deposita(500);

$primeiraConta->saca(300); 
var_dump($primeiraConta);
// echo $primeiraConta->getSaldo().PHP_EOL;
// echo $primeiraConta->getCpfAccHolder().PHP_EOL;
// echo $primeiraConta->getNameAccHolder().PHP_EOL;


// $segundaConta = new Account(new AccountHolder(new CPF('698.549.548-10'), 'Lui SP', $address));
// var_dump($segundaConta);
// $new_address = new Address('LEB','peri','A', '179');
// $new = new Account(new AccountHolder(new CPF('698.549.548-10'), 'Audrey Hep', $new_address));
// echo Account::getAccountAmount();

