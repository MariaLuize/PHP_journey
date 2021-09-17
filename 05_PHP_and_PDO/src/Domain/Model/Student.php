<?php

namespace Alura\Pdo\Domain\Model;

class Student
{
    // Veremos um $id na classe Student, pois é interessante que consigamos identificar o 
    // registro de maneira única sempre que salvamos algo no banco de dados.
    private ?int $id;
    private string $name;

    // https://www.alura.com.br/artigos/manipulando-datas-e-horarios-com-php
    private \DateTimeInterface $birthDate;

    public function __construct(?int $id, string $name, \DateTimeInterface $birthDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function birthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function age(): int
    {
        return $this->birthDate
            ->diff(new \DateTimeImmutable())
            ->y;
    }
}
