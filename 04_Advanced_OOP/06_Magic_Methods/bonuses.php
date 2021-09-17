<?php
require_once 'autoload.php';
use Alura\Bank\Model\{CPF};
use Alura\Bank\MOdel\Employee\{Employee, Manager, Director, Dev, VideoEditor};
use Alura\Bank\Service\BonusController;

$cpf1           = new CPF('645.616.546-41');
$funcionario    = new Director($cpf1, 'Luize Maria', 3000);

$cpf2           = new CPF('514.126.576-11');
$funcionario2   = new VideoEditor($cpf2, 'Luan Pinheiro', 1000);

$cpf3           = new CPF('514.126.576-11');
$funcionario3   = new Manager($cpf3, 'Pinheiro', 2000);

$cpf4           = new CPF('867.781.866-18');
$funcionario4   = new Dev($cpf4, 'Nome abs', 1500);

$funcionario4 -> getSalary();
$funcionario4 -> upLevel();
$funcionario4 -> getSalary();

echo $funcionario4->name;
exit();

$controladorBonus = new BonusController();
$controladorBonus->addBonus($funcionario);
$controladorBonus->addBonus($funcionario2);
$controladorBonus->addBonus($funcionario3);
$controladorBonus->addBonus($funcionario4);

echo $controladorBonus->getTotalBonus();