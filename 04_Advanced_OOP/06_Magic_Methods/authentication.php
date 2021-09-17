<?php
require_once 'autoload.php';

use Alura\Bank\Model\{CPF, Address};
use Alura\Bank\Model\Employee\{Director,Manager};
use Alura\Bank\Service\{Authenticator};
use Alura\Bank\Model\Account\{AccountHolder};

$cpf1      = new CPF('645.616.546-41');
$address   = new Address('BEL','sacramenta','alferes', '330');

$titular   = new AccountHolder($cpf1, 'Nataniela Maria', $address);
$director  = new Director($cpf1, 'Luize Maria', 30000);
$manager   = new Manager($cpf1, 'Luize Silva', 32000);

$auth      = new Authenticator();
$auth->tryLogin($director,"1234");
$auth->tryLogin($manager,"1122");
$auth->tryLogin($titular,"74123");
