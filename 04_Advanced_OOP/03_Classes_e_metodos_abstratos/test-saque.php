<?php

use Alura\Bank\Model\{Person, CPF, Address, Employee};
use Alura\Bank\Model\Account\{AccountHolder, Account, PoupancaAccount, CorrenteAccount};
require_once 'autoload.php';

$cpf            = new CPF('645.616.546-41');
$address        = new Address('BEL','sacramenta','alferes', '330');
$titular        = new AccountHolder($cpf, 'Nataniela Maria', $address);
$conta          = new CorrenteAccount($titular);
$contaPou       = new PoupancaAccount($titular);

$conta->deposita(500);
$conta->saca(100);
// var_dump($conta); 
echo $conta->getSaldo().PHP_EOL;

$contaPou->deposita(500);
$contaPou->saca(100); 
// var_dump($contaPou);
echo $contaPou->getSaldo();

