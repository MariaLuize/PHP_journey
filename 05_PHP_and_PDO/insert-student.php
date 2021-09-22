<?php
use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';

$databasePath = __DIR__.'/database.sqlite'; //Caminhoabsoluto para o bank(recomentado por https://www.php.net/manual/pt_BR/ref.pdo-sqlite.connection.php)
$pdo = new PDO('sqlite:'.$databasePath);

$student = new Student(
    null,
    'Maria Luize',
    new \DateTimeImmutable('1999-01-26')
);

// Pra inserir string em databse devemos usar aspas simples
// $student->name() chama 'Maria Luize', e $student->birthdate()->format('Y-m-d)} chama a data de nascimento e transforma pro formato Ano-mês-dia
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES('{$student->name()}', '{$student->birthdate()->format('Y-m-d')}');";
// echo $sqlInsert;
var_dump($pdo->exec($sqlInsert));
