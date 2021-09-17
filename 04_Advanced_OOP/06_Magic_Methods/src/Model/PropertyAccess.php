<?php
namespace Alura\Bank\Model;

/*  Próprio PHP copiar código de algum local e injetá-lo na classe desejada. 
    O PHP na verdade possui tal funcionalidade, e ela se chama trait.
    https://www.php.net/manual/en/language.oop5.traits.php */

trait PropertyAccess
{
    
    public function __get(string $attributeName)
    {
        /**
         * O padrão dos métodos de acesso é: 'get + Nome do atributo'
         * Logo, concatena-se a string 'get', com o nome do atributo, transformando
         * a sua primeira locale_filter_matchesem maiúscula
         * https://www.php.net/manual/en/language.oop5.overloading.php#object.get
         */

        $method = 'get'.ucfirst($attributeName);
        // echo $method; //Aqui ele já esta no padrão dos getters
        return $this->$method();
    }

    // Deixe aqui neste tópico sua implementação do método __set para que seja possível 
    // atribuir um valor diretamente às propriedades da classe Address
    // https://www.php.net/manual/en/language.oop5.overloading.php#object.set
    public function __set(string $attributeName, string $value)
    {
        return $this->$attributeName = $value;
    }

}
