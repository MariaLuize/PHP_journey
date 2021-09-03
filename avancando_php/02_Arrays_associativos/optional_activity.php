<?php
/* 
 * Experimente a declaração de um array associativo que mapea a placa do carro (tipo string, por exemplo LMS-2312) 
 * para um carro. O carro também é um array associativo que possui uma marca (por exemplo 'marca' => 'VW') e  
 * o modelo (por exemplo 'modelo' => 'Golf'). 
*/

$cars = [
    'LMS-2312'=> [
        'assembler' => 'BMW',
        'model' => 'i4 eDRIVE40'
    ],
    'KLM-1324' => [
        'assembler' => 'Ford',
        'model' => 'Fiesta'
    ],
    'OPN-5612' => [
        'assembler' => 'Fiat',
        'model' => 'Uno'
    ],    
];

foreach($cars as $car_plate=>$car){
    echo $car_plate.': '.$car['assembler'].', '.$car['model'].PHP_EOL;
};





