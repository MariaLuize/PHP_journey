<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Maria Luize',
    new \DateTimeImmutable('1999-01-26')
);

echo $student->age();
