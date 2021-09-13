<?php

class Account
{


    // Value Object: https://martinfowler.com/bliki/ValueObject.html.

    //  Saiba que é uma recomendação geral na orientação a objetos que tenhamos apenas propriedades privadas nas classes, e que somente os métodos sejam públicos
    private AccountHolder $accountHolder; //acesso à classe AccountHolder
    private float  $saldo;

    // Atributo da classe Account, e não de seus objetos (static)
    private static int $accountAmount = 0;

    // Inicialização dos atributos privados
    public function __construct (AccountHolder $accountHolder)
    {
        $this->accountHolder = $accountHolder;
        $this->saldo         = 0;

        // Self é o equivalente à $this, mas referente a classe em questão, a classe atual
        // self:: $accountAmount ++; é o mesmo que Account:: $accountAmount ++;
        self:: $accountAmount ++;
    }

    /* o garbage collector(__destruct()) é responsável por destruir as instâncias, ou seja apaga-las da memória, 
    Sempre que o número de referências para um objeto chega a 0, ou seja, não há mais nenhuma variável sendo apontada para ele, 
    o método destrutor é chamado. A partir deste ponto, o Garbage Collector pode remover este objeto da memória. */
    public function __destruct()
    {
        self::$accountAmount--;
    }

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

    // Acesso aos atributos

    /* Os métodos recuperaNomeTitular() e recuperaCpfTitular() não existem mais. Nesse caso, as alternativas são implementarmos novamente 
        esses métodos, agora chamando o recuperaCpf() e recuperaNome() da classe Titular, ou criarmos um método recuperaTitular() que devolve
        um objeto do tipo Titular a partir do qual poderíamos chamar os métodos citados. Faremos a implementação da primeira forma, 
        implementando novamente na classe Conta os métodos recuperaNomeTitular() e recuperaCpfTitular(). Ambos retornarão strings 
        conseguidas a partir da chamada de $this->titular->recuperaNome() e $this->titular->recuperaCpf(), respectivamente.
    */
    public function getNameAccHolder(): string
    {
        return $this->accountHolder->getName();
    }

    public function getCpfAccHolder(): string
    {
        return $this->accountHolder->getClassCpf();
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    public static function getAccountAmount():int
    {
        return self:: $accountAmount;
    }
    
}