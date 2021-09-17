<?php
namespace Alura\Bank\Model;

/**
 * UMA interface É, BASICAMENTE, UMA CLASSE ABSTRATA EM QUE TODOS
 * OS SEUS MÉTODOS SÃO ABSTRATOS. CLASSES SÓ PODEM EXTENDER (extends) DE UMA CLASSE PAI, 
 * PORÉM PODEM IMPLEMENTAR (implements) INFINITAS INTERFACES
 * 
 * Interface é um contrato onde quem assina se responsabiliza por implementar esses métodos (cumprir o contrato)
 * Todas as classes que decidirem implementar uma interface precisam implementar todos os métodos nela definidos.
 */

interface Authenticable
{
    public function canAuthenticate(string $pass): bool;
}