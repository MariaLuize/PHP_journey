<?php
namespace Alura\Bank\Model;

// HERANÇA: https://blog.caelum.com.br/como-nao-aprender-orientacao-a-objetos-heranca/
/* A ideia agora é fazermos com que nosso titular seja uma pessoa, ou seja, com que a classe Titular tenha tudo que Person tem, 
com a adição do $endereco. Para isso, usaremos a palavra-chave extends, determinando que Titular estende aquilo que a classe Pessoa já definiu. */
class Employee extends Person
{
    private string $bussPosition ;

    public function __construct(CPF $cpf, string $name, string $bussPosition)
    {
        /*  CHAMANDO O CONSTRUTOR DA CLASSE BASE(CHAMADA DE parent PELO PHP) que se refere à classe mãe daquela que está fazendo a execução, 
            O QUE NESSE CASO É A CLASSE PERSON */

        /*  O construtor é um método utilizado para inicializar os atributos que um objeto de determinada classe terá. 
            Ter uma classe base com um construtor significa que alguma coisa precisa ser inicializada, e, portanto, é interessante 
            sempre chamarmos o construtor dela, mesmo que no PHP isso não seja obrigatório. Com isso evitamos duplicação de código 
            e garantimos a consistência da nossa aplicação. */
        parent::__construct($name, $cpf);
        $this->bussPosition = $bussPosition;
    }

    public function getBussPosition(): string
    {
        return $this->bussPosition;
    }

    public function changeName(string $name): void
    {
        $this->validationName($name);
        $this->name   = $name;
    }
}
