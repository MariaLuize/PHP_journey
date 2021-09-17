<?php

// O PDO é a forma com a qual acessamos um banco de dados, utilizando um driver
// Tipos de drivers: https://www.php.net/manual/pt_BR/pdo.drivers.php#pdo.drivers
// Para sqlite: https://www.php.net/manual/pt_BR/ref.pdo-sqlite.php 

// classe PDO(), é classe utilizada para fazer a conexão
/** 
 * O PDO() aceita até três parâmetros; o primeiro é o que chamamos de string de conexão
 * (chamada de DSN pela documentação oficial do PHP), a qual informará qual é o driver utilizado e os detalhes específicos de cada banco de 
 * dados separados por ":". Caso seja MySQL, informaremos o host, o dbname e etc., mas como 
 * se trata de SQLite, bastará informarmos apenas o caminho para o database: bank.sqlite.
*/

// __DIR__ indica o caminho atual
$bankPath = __DIR__.'/bank.sqlite'; //Caminhoabsoluto para o bank(recomentado por https://www.php.net/manual/pt_BR/ref.pdo-sqlite.connection.php)
 $pdo = new PDO('sqlite:'.$bankPath);

echo 'conectei';