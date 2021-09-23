<?php
namespace Alura\Cursos\Controller;

use \Alura\Cursos\Infra\EntityManagerCreator;
use \Alura\Cursos\Entity\Curso;

// A class ListarCursos possui a lógica para acessar o banco de dados pelo Doctrine

// Fizemos agora com que todos os nossos controladores de requisição implementem uma interface em comum, função processaRequisicao()
class ListarCursos implements Interface_ControladorRequisicao
{

    private \Doctrine\ORM\EntityManagerInterface $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->$repositorioDeCursos = $entityManager
            ->getRepository(Curso::class);
    }


    public function processaRequisicao():void
    {
        $cursos = $this->$repositorioDeCursos->findAll();
        $title = 'Listar os Cursos Cadastrados';
        // com o require, todos ar variáveis presentes na função processaRequisicao(), de ListarCursos.php 
        // tbm estarão em view-listar-cursos.php
        require __DIR__.'/../../view/cursos/view-listar-cursos.php';
    }
}