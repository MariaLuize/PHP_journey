<?php
use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';

$databasePath = __DIR__.'/database.sqlite'; //Caminho absoluto para o bank(recomentado por https://www.php.net/manual/pt_BR/ref.pdo-sqlite.connection.php)
$pdo = new PDO(dsn:'sqlite:'.$databasePath);

// Retorna um único dado(linha da tabela)
$statementOne = $pdo->query('SELECT * FROM students WHERE id=1;');
var_dump($statementOne->fetchColumn(1)); // $statementOne->fetchColumn(1) retorna o valor da coluna 1 do dado retornado por $statementOne

$statementOne = $pdo->query('SELECT * FROM students WHERE id=1;');
$studentDataOne = $statementOne->fetch(PDO::FETCH_ASSOC);
print_r($studentDataOne);

die();
// RETORNAR TODOS OS DADOS
// https://www.php.net/manual/en/class.pdostatement.php
$statementAll = $pdo->query('SELECT * FROM students;');

/**
 * No caso de não queremos usar o fetchAll() por ele retornar todos os dados de uma vez
 * e, assim, encher a memória, podemos usar um "while". A ideia é que, desde que algo seja retornado
 * pelo $statementAll->fetch(mode: PDO::FETCH_ASSOC), podemos criar um objeto Student, com os dados retornados pelo dado da linha da tabela,
 * armazena-lo na memória e então executar o código desejado.
 * Assim que o while entrar no próximo loop, o antigo objeto será apagado da memória.
*/
while ($studentData = $statementAll->fetch(mode: PDO::FETCH_ASSOC)) {
    $student = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable($studentData['birth_date'])
    );

    echo $student->age() . PHP_EOL;
}
die();



// https://www.php.net/manual/en/pdostatement.fetch.php
$studentData = $statementAll->fetchAll(PDO::FETCH_ASSOC);
// var_dump($statement->fetchAll());
// Lista de objetos do tipo student
$studentList=[];

// criar objetos do tipo Student utilizando os dados presentes na TABELA students!!!
foreach($studentData as $student){
    $studentList[] = new Student(   
        $student['id'], 
        $student['name'],
        new \DateTimeImmutable($student['birth_date']));
};

var_dump($studentList);
// echo $result[0]['id'].PHP_EOL; 
// echo $result[0]['name'].PHP_EOL;
// echo $result[0]['birth_date'].PHP_EOL;




