<?php
namespace Alura\Bank\Model\Account;

class PoupancaAccount extends Account
{

    // sobreescreção do método original, que esta no arquivo Account.php
    protected function bankFeePercentage():float
    {
        return 0.03;
    }

}