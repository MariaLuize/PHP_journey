<?php
namespace Alura\Bank\Model\Employee;

class Dev extends Employee
{
    public function upLevel()
    {
        // increaseSalary é um método da classe abstrata Employee, que só é chamada na classe filha Dev
        $this->increaseSalary($this->getSalary() * 0.75);
    }
}
