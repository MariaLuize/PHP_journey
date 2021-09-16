<?php

// HERANÇA: https://blog.caelum.com.br/como-nao-aprender-orientacao-a-objetos-heranca/
/* A ideia agora é fazermos com que nosso titular seja uma pessoa, ou seja, com que a classe Titular tenha tudo que Person tem, 
com a adição do $endereco. Para isso, usaremos a palavra-chave extends, determinando que Titular estende aquilo que a classe Pessoa já definiu. */
class AccountHolder extends Person
{
    private Address $addressClass;

    public function __construct(CPF $cpf, string $name, Address $addressClass)
    {
        /*  CHAMANDO O CONSTRUTOR DA CLASSE BASE(CHAMADA DE parent PELO PHP) que se refere à classe mãe daquela que está fazendo a execução, 
            O QUE NESSE CASO É A CLASSE PERSON */
        parent::__construct($name, $cpf);
        $this->addressClass = $addressClass;
    }

    // Access methods

    // No caso de retornar um objeto inteiro da classe Address, tenho acesso a todos os métodos, e não somente a um método
    public function getClassAddress():Address
    {
        return $this->addressClass;
    }
}