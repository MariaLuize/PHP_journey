<?php
namespace Alura\Cursos\Controller;

use \Alura\Cursos\Infra\EntityManagerCreator;
use \Alura\Cursos\Entity\Curso;

class FormularioEdicaoCurso implements Interface_ControladorRequisicao
{

    private \Doctrine\ORM\EntityManagerInterface $entityManager;
    
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->$repositorioDeCursos = $entityManager
            ->getRepository(Curso::class);

    }
    public function processaRequisicao():void
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        if($id === false || is_null($id)){ //ou seja, caso seja um id inválido ou nulo
            header('Localization:/listar-cursos');
            return;
        }

        // Find the course in the database
        $curso = $this->$repositorioDeCursos->find($id);

        $title = 'Editar Curso: '.$curso->getDescricao();
        require __DIR__.'/../../view/cursos/formulario-curso.php';
    }
}