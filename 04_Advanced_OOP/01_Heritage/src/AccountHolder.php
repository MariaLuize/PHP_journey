<?php

// HERANÇA: https://blog.caelum.com.br/como-nao-aprender-orientacao-a-objetos-heranca/
/* A ideia agora é fazermos com que nosso titular seja uma pessoa, ou seja, com que a classe Titular tenha tudo que Person tem, 
com a adição do $endereco. Para isso, usaremos a palavra-chave extends, determinando que Titular estende aquilo que a classe Pessoa já definiu. */
class AccountHolder extends Person
{
    private Address $addressClass;

    public function __construct(CPF $cpfClass, string $name, Address $addressClass)
    {
        $this->cpfClass = $cpfClass;
        $this->validationName($name);
        $this->name = $name;
        $this->addressClass = $addressClass;
    }

    // Access methods
    public function getClassAddress():Address
    {
        return $this->addressClass;
    }
}