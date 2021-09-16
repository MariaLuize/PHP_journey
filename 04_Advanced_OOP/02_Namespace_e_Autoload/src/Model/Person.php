<?php
namespace Alura\Bank\Model;


use Alura\Bank\Model\CPF;
/*Se quisermos acessar o nome ou o CPF, poderemos fazer isso por meio dos métodos getName() e getCpfFromClass() da própria classe Pessoa. 
Não temos a necessidade de acessar esses atributos fora da classe Pessoa e, portanto, podemos encapsulá-los nos objetos desse tipo. */

/*O modificador de acesso que permite a visibilidade apenas nas classes filhas é chamado de protected. 
Quando qualquer membro, seja atributo ou método, é protegido (protected), ele pode ser acessado tanto pela classe 
na qual ele é definido quanto pelas classes filhas, mas não pelo mundo externo. */
class Person
{
    protected string $name;
    private CPF $cpf;

    public function __construct(string $name, CPF $cpf)
    {
        // Validção feita no construtor de Person
        $this->validationName($name);
        $this->name   = $name;
        $this->cpf    = $cpf;
    }

    public function getName():string
    {
        return $this->name;
    }


    // Recupera o numero do cpf que é uma string
    public function getCpfFromClass():string
    {
        // O getCpf() é um método da classe CPF!!
        return $this->cpf->getCpf();
    }

    // Validação, a função é privada pois só deve usada pelo __construct, que é uma função interna
    protected function validationName(string $nameAccount)
    {
        if (strlen($nameAccount)<5){
            echo "Quantidade de caracteres insuficiente".PHP_EOL;
            exit();
        }
    }
}