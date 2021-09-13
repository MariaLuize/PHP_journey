<?php

class AccountHolder
{
    private CPF $cpfClass;
    private string $name;

    public function __construct(CPF $cpfClass, string $name)
    {
        $this->cpfClass = $cpfClass;
        $this->validationName($name);
        $this->name = $name;
    }

    // Access methods
    public function getClassCpf():string
    {
        return $this->cpfClass->getCpf();
    }
    
    public function getName():string
    {
        return $this->name;
    }

    // Validação, a função é privada pois só deve usada pelo __construct, que é uma função interna
    private function validationName(string $nameAccount)
    {
        if (strlen($nameAccount)<5){
            echo "Quantidae de caracteres insuficiente".PHP_EOL;
            exit();
        }
    }
}