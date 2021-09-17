<?php
namespace Alura\Bank\Model\Employee;
use Alura\Bank\Model\{Authenticable};


class Manager extends Employee implements Authenticable 
{
    // sobreescreção do método original, que esta no arquivo Account.php
    public function salaryBonus():float
    {
        return $this->getSalary();
    }

    public function canAuthenticate(string $pass):bool
    {
        return $pass === '1122';
    }
}
