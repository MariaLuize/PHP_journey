<?php
namespace Alura\Bank\Model\Account;

class CorrenteAccount extends Account
{

    // sobreescreção do método original, que esta no arquivo Account.php
    protected function bankFeePercentage():float
    {
        return 0.05;
    }
   
    public function transfer(float $valueToTranfer, Account $destinyAccount):void{
        if ($valueToTranfer > $this->saldo){
            echo "Saldo indisponível".PHP_EOL;
            return;
        }
        
        $this->saca($valueToTranfer);
        $destinyAccount->deposita($valueToTranfer);
    }

}