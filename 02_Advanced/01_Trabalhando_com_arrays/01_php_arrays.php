<?php 

// para dizer q é array
$ageList = array(1,4234,535,65,798,8453,7,3,5,25,7);
$ageList = [1,4234,535,65,798,8453,7,3,5,25,7];

// indexação
$zeroIndex = $ageList[0];
// echo $zeroIndex;
// echo count($ageList);

// ADICIONANDO VALORES
// Com esta sintaxe, o PHP adicionará o item no próximo índice NUMÉRICO disponível.
$ageList[]=20; //adiciona na ultima posição

// LOOP PELOS ELEMENTOS DO ARRAY
for ($index = 0;$index<count($ageList);$index++){
    echo $ageList[$index].PHP_EOL;
}

$nameList = array( "João", "Maria", "Pedro", "Ana");

for($n=0;$n<count($nameList);$n++){
    echo $nameList[$n].PHP_EOL;

}
