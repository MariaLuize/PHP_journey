<?php

class Account
{
    // todos que possuiem um objeto do tipo Account, podem acessar as informações abaixo (são públicas)
    public string $cpfTitular;
    public string $nomeTitular;
    public float  $saldoTitular =0;

     // :void indica que o método não devolve nada, isto é, não possui retorno
    public function sacar(float $value):void
    {
        if ($value > $this->saldoTitular){
            echo ("Operação não permitida. Saldo indisponível").PHP_EOL;

            /* Early return
                https://dorianneto.com.br/boas-praticas/torne-se-um-ninja-das-funcoes-com-early-return/
                https://youtu.be/u-w4eULRrr0?t=904
            */
            return;
        }

        $this->saldoTitular -= $value;
        
    }

    public function depositar(float $value):void
    {
        if ($value < 0){
            echo ("Operação não permitida. Valor negativo").PHP_EOL;
            return;
        }

        $this->saldoTitular += $value;
        
    }

    public function transfer(float $valueToTranfer, Account $destinyAccount):void{
        if ($valueToTranfer > $this->saldoTitular){
            echo "Saldo indisponível".PHP_EOL;
            return;
        }
        
        $this->sacar($valueToTranfer);
        $destinyAccount->depositar($valueToTranfer);
    }
}