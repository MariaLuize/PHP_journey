<?php

class CPF
{
    private string $cpf_number;

    public function __construct(string $cpf_number)
    {
        $cpf_number = filter_var($cpf_number, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);
     
        // Validação rudimentar
        if ($cpf_number === false) {
            echo "Cpf inválido";
            exit();
        }
        
        $this->cpf_number = $cpf_number;
    }
    
    public function getCpf():string
    {
        return $this->cpf_number;
    }
}