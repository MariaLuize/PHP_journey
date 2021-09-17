<?php
namespace Alura\Bank\Model;


use Alura\Bank\Model\CPF;
/*Se quisermos acessar o nome ou o CPF, poderemos fazer isso por meio dos métodos getName() e getCpfFromClass() da própria classe Pessoa. 
Não temos a necessidade de acessar esses atributos fora da classe Pessoa e, portanto, podemos encapsulá-los nos objetos desse tipo. */

/*O modificador de acesso que permite a visibilidade apenas nas classes filhas é chamado de protected. 
Quando qualquer membro, seja atributo ou método, é protegido (protected), ele pode ser acessado tanto pela classe 
na qual ele é definido quanto pelas classes filhas, mas não pelo mundo externo. */
abstract class Person
{
    /**Na aula de namespaces comentamos que a palavra use poderia significar coisas diferentes dependendo 
     * de onde ela é colocada em uma arquivo. Nesse caso, como estamos colocando-a diretamente dentro de uma classe, 
     * quer dizer que estamos utilizando uma trait. Isso implica que o PHP irá "colar" o conteúdo da trait no local 
     * informado, como se estivéssemos fazendo um "copia e cola" dos seus métodos, permitindo acesso ao __get() e __set().
     */
    use PropertyAccess; // Não precisar usar o "use" fora da classe, pois ambos esão no mesmo namespace

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
    // final indica que não é possível sobreescrever esse método
    final protected function validationName(string $nameAccount)
    {
        if (strlen($nameAccount)<5){
            echo "Quantidade de caracteres insuficiente".PHP_EOL;
            exit();
        }
    }
}