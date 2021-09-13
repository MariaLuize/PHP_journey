<?php

// HERANÇA: https://blog.caelum.com.br/como-nao-aprender-orientacao-a-objetos-heranca/
/* A ideia agora é fazermos com que nosso titular seja uma pessoa, ou seja, com que a classe Titular tenha tudo que Person tem, 
com a adição do $endereco. Para isso, usaremos a palavra-chave extends, determinando que Titular estende aquilo que a classe Pessoa já definiu. */
class Employee extends Person
{
    private string $bussPosition ;

    public function __construct(string $name, CPF $cpf, string $bussPosition)
    {
        $this->validationName($name);
        $this->name   = $name;
        $this->cpf    = $cpf;
        $this->bussPosition = $bussPosition;
    }

    public function getBussPosition(): string
    {
        return $this->bussPosition;
    }
}
