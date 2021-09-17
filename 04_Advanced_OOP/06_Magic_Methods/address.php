<?php
require_once 'autoload.php';

use Alura\Bank\Model\Address;

// Mostrar relatório sobre todos os endereços criados
$address1   = new Address('BEL','sacramenta','alferes', '330');
$address2   = new Address('FLO','Nova Palhoça','Bonita', '87a');

/**
 * Sempre que tentarmos representar um objeto como string (seja com echo, passando por parâmetro ou retornando) 
 * o método __toString é procurado, e se a classe o tiver, seu retorno é utilizado.
 */
// echo $address1.PHP_EOL;
// echo $address2.PHP_EOL;

// Acesso aos atributos usando __get()
echo  $address1->number.PHP_EOL;
echo  $address1->number = "8A";
// echo  $address1->number;
