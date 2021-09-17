<?php
namespace Alura\Bank\Model\Employee;
use Alura\Bank\Model\{Authenticable};


class Director extends Employee implements Authenticable
{
    public function salaryBonus():float
    {
        return $this->getSalary()*2;
    }

    public function canAuthenticate(string $pass):bool
    {
        return $pass === '1234';
    }
}
