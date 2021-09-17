<?php
namespace Alura\Bank\Service;
use Alura\Bank\Model\{Authenticable};

class Authenticator
{
    public function tryLogin(Authenticable $authenticable, string $pass):void
    {
        if($authenticable->canAuthenticate($pass)){
            echo "Pode passar".PHP_EOL;
        }else{
            echo "Não pode passar".PHP_EOL;
        }


    }
}
