<?php
namespace Alura\Bank\Model;

// final impede que outra classe herda da classe Address.php
final class Address
{

    /**Na aula de namespaces comentamos que a palavra use poderia significar coisas diferentes dependendo 
     * de onde ela é colocada em uma arquivo. Nesse caso, como estamos colocando-a diretamente dentro de uma classe, 
     * quer dizer que estamos utilizando uma trait. Isso implica que o PHP irá "colar" o conteúdo da trait no local 
     * informado, como se estivéssemos fazendo um "copia e cola" dos seus métodos, permitindo acesso ao __get() e __set().
     */

    use PropertyAccess; // Não precisar usar o "use" fora da classe, pois ambos esão no mesmo namespace

    private string $city;
    private string $neighborhood;
    private string $street;
    private string $number;

    public function __construct(string $city, string $neighborhood, string $street, string $number)
    {
        $this->city         = $city;
        $this->neighborhood = $neighborhood;
        $this->street       = $street;
        $this->number       = $number;
    }

    public function getCity():string
    {
        return $this->city;
    }

    public function getNeighborhood():string
    {
        return $this->neighborhood;
    }

    public function getStreet():string
    {
        return $this->street;
    }

    public function getNumber():string
    {
        return $this->number;
    }

    //para exibir todos os atributos do objeto <Address></Address>
    public function __toString(): string
    {
        return "{$this->street}, {$this->number}, {$this->neighborhood}, {$this->city}";
    }
}