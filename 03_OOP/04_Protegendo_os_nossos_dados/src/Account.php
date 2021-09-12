<?php

class Account
{
    //  Saiba que é uma recomendação geral na orientação a objetos que tenhamos apenas propriedades privadas nas classes, e que somente os métodos sejam públicos
    private string $cpfTitular;
    private string $nomeTitular;
    private float  $saldo =0;

     // :void indica que o método não devolve nada, isto é, não possui retorno
    public function saca(float $value):void
    {
        if ($value > $this->saldo){
            echo ("Operação não permitida. Saldo indisponível").PHP_EOL;
            /* Early return: https://dorianneto.com.br/boas-praticas/torne-se-um-ninja-das-funcoes-com-early-return/
                             https://youtu.be/u-w4eULRrr0?t=904
            */
            return;
        }

        $this->saldo -= $value; 
    }

    public function deposita(float $value):void
    {
        if ($value < 0){
            echo ("Operação não permitida. Valor negativo").PHP_EOL;
            return;
        }

        $this->saldo += $value;
    }

    public function transfer(float $valueToTranfer, Account $destinyAccount):void{
        if ($valueToTranfer > $this->saldo){
            echo "Saldo indisponível".PHP_EOL;
            return;
        }
        
        $this->saca($valueToTranfer);
        $destinyAccount->deposita($valueToTranfer);
    }

    // Definir atributos
    public function setCpfTitular(string $cpf): void
    {
        $this->cpfTitular = $cpf;
    }

    public function setNomeTitular(string $nome): void
    {
        $this->nomeTitular = $nome;
    }

    // Acesso aos atributos
    public function getCpfTitular(): string
    {
        return $this->cpfTitular;
    }

    public function getNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }
}