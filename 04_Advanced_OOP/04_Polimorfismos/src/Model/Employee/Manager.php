<?php
namespace Alura\Bank\Model\Employee;


class Manager extends Employee
{
    // sobreescreção do método original, que esta no arquivo Account.php
    public function salaryBonus():float
    {
        return $this->getSalary();
    }
}
