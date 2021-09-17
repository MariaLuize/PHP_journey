<?php
require_once 'autoload.php';
use Alura\Bank\Model\{Person, CPF, Address, Employee};
use Alura\Bank\Service\BonusController;

$cpf            = new CPF('645.616.546-41');
$funcionario    = new Employee($cpf, 'Luize Maria', 'Dev e Geo', 3000);


$cpfL           = new CPF('514.126.576-11');
$funcionarioLuan= new Employee($cpfL, 'Luan Pinheiro', 'RI', 1000);

// var_dump($funcionario);

$controladorBonus = new BonusController();
$controladorBonus->addBonus($funcionario);
$controladorBonus->addBonus($funcionarioLuan);

echo $controladorBonus->getTotalBonus();