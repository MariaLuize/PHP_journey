<?php
namespace Alura\Bank\Service;
use Alura\Bank\Model\Employee\Employee;

class BonusController
{
    private float $totalBonus=0;

    /**
     * O conceito de Polimorfismo garante que, qualquer instancia da classe
     * Employee.php, pode ser aceeita no método addBonus(). Não importanto se for
     * uma instancia direta de Employee.php ou qualquer classe filha, qualquer uma que extends da classe pai Employee.php 
     * https://www.caelum.com.br/apostila-java-orientacao-objetos/heranca-reescrita-e-polimorfismo#polimorfismo
    */
    
     public function addBonus(Employee $employee)
    {
        // O total de bonificações é a soma do que já tinha mais a bonificação dos salarios de cada funcionário
        // inicializado quando se cria um objeto BonusController
        $this->totalBonus += $employee->salaryBonus();
    }

    public function getTotalBonus():float
    {
        return $this->totalBonus;
    }
    
}    