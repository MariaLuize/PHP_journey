<?php
namespace Alura\Cursos\Controller;

// Fizemos agora com que todos os nossos controladores de requisição implementem uma interface em comum.
// Garantindo que todos os nossos controladores implementem uma interface em comum, expondo um método para 
// processar a requisição, podemos fazer uso deles no front controller de forma semelhante.

class FormularioInsercaoCurso implements Interface_ControladorRequisicao
{
    public function processaRequisicao() : void
    {
        $title = 'Cadastrar Novo Curso';
        require __DIR__.'/../../view/cursos/formulario-curso.php';
    }
}