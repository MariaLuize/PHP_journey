<?php
    // echo "hello world!";
    // // phpinfo();
    // $idade = 21;
    // echo "\n";
    // echo gettype($idade). PHP_EOL;

    // echo "minha idade é $idade \n";

    // echo "minha idade é \"$idade\" \n";

    // // OPERADOR TERNÁRIO
    // $idade = 15;
    // $mensagem = $idade < 18 ? "Você é menor de idade" : "Você é maior de idade";
    // echo $mensagem;

    // echo PHP_EOL;
    // echo "Adeus!";


    // $contador = 1;

    // while ($contador <= 15) {
    //     echo "#$contador" . PHP_EOL;
    //     $contador = $contador + 1;
    // }

    // for ($contador = 1; $contador <= 15; $contador++) {
    //     echo "#$contador" . PHP_EOL;
    // }

    // DESAFIOS ALURA
    // // 1  - Exibir todos os numeros impares até 100
    // for ($i = 0; $i<= 100; $i ++)
    // {
    //     if ($i%2 != 0)
    //     {
    //         echo $i. PHP_EOL;
    //     }
  
    // }
    // 2  - Exibir a tabuada de determinado numero
    // $num = 2;
    // for ($i = 0; $i <= 10; $i ++)
    // {
    //     echo "$num x $i = ".$num*$i . PHP_EOL;
    // }

    //3 - Calcular IMC 
    // IMC = peso/ (altura x altura),

    function imc($peso, $altura)
    {
        $imc = $peso / ($altura**2);
        if ($imc < 18){
            echo "abaixo". PHP_EOL;
        }elseif ($imc<25){
            echo "normal". PHP_EOL;
        }else{
            echo "acima". PHP_EOL;
        }
        return $imc;
    }

    echo imc(60,1.65);


    