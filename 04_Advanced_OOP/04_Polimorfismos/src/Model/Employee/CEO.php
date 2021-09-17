<?php
namespace Alura\Bank\Model\Employee;

class CEO extends Employee
{
    protected function salaryBonus():float
    {
        return $this->getSalary()*2;
    }

    public function autentication(string $pass):bool
    {
        return $pass ==='1234';
    }
}
