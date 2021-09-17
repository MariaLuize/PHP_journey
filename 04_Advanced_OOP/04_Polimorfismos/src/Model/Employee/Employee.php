<?php
namespace Alura\Bank\Model\Employee;

use Alura\Bank\Model\Person;
use Alura\Bank\Model\{CPF};
// HERANÇA: https://blog.caelum.com.br/como-nao-aprender-orientacao-a-objetos-heranca/
/* A ideia agora é fazermos com que nosso titular seja uma pessoa, ou seja, com que a classe Titular tenha tudo que Person tem, 
com a adição do $endereco. Para isso, usaremos a palavra-chave extends, determinando que Titular estende aquilo que a classe Pessoa já definiu. */
abstract class Employee extends Person
{
    private string $bussPosition;
    private float $salary;


    public function __construct(CPF $cpf, string $name, string $bussPosition, float $salary)
    {
        /*  CHAMANDO O CONSTRUTOR DA CLASSE BASE(CHAMADA DE parent PELO PHP) que se refere à classe mãe daquela que está fazendo a execução, 
            O QUE NESSE CASO É A CLASSE PERSON */

        /*  O construtor é um método utilizado para inicializar os atributos que um objeto de determinada classe terá. 
            Ter uma classe base com um construtor significa que alguma coisa precisa ser inicializada, e, portanto, é interessante 
            sempre chamarmos o construtor dela, mesmo que no PHP isso não seja obrigatório. Com isso evitamos duplicação de código 
            e garantimos a consistência da nossa aplicação. */
        parent::__construct($name, $cpf);
        $this->bussPosition = $bussPosition;
        $this->salary = $salary;
    }

    public function getBussPosition(): string
    {
        return $this->bussPosition;
    }

    public function changeName(string $name): void
    {
        $this->validationName($name);
        $this->name   = $name;
    }

    public function increaseSalary(float $increaseValue):void
    {
        if($increaseValue<0){
            echo "O valor do aumento deve ser positivo";
            return;
        }
        $this->salary += $increaseValue;

    }

    public function getSalary():float
    {
        return $this->salary;
    }


    // Atualmente, apenas a classe Dev usa a bonificação padrão

    /**
     * ESSA FUNÇÃO DEVE SER public POIS, ELA É CHAMADA NA CLASSE DE SERVIÇO BonusController.php,
     * E ESSA CLASSE NÃO EXTENDS A CLASSE Employee.php */
    public function salaryBonus():float
    {
        return $this->salary*0.1;
    }
}
