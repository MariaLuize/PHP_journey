<?php
namespace Alura\Bank\Service;
use Alura\Bank\Model\Employee;

class BonusController
{
    private float $totalBonus=0;

    public function addBonus(Employee $employee)
    {
        // O total de bonificações é a soma do que já tinha mais a bonificação dos salarios de cada funcionário
        $this->totalBonus += $employee->salaryBonus();
    }

    public function getTotalBonus():float
    {
        return $this->totalBonus;
    }
    
}    