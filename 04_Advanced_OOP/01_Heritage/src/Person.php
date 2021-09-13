<?php


class Person
{
    public string $name;
    public CPF $cpf;

    public function __construct(string $name, CPF $cpf)
    {
        $this->name   = $name;
        $this->cpf    = $cpf;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getCpf():string
    {
        return $this->cpf->getCpf();
    }

    // Validação, a função é privada pois só deve usada pelo __construct, que é uma função interna
    public function validationName(string $nameAccount)
    {
        if (strlen($nameAccount)<5){
            echo "Quantidade de caracteres insuficiente".PHP_EOL;
            exit();
        }
    }
}