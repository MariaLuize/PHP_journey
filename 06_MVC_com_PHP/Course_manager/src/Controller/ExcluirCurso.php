<?php
namespace Alura\Cursos\Controller;

use \Alura\Cursos\Infra\EntityManagerCreator;
use \Alura\Cursos\Entity\Curso;

class ExcluirCurso implements Interface_ControladorRequisicao
{
    private \Doctrine\ORM\EntityManagerInterface $entityManager;
    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();

    }

    public function processaRequisicao():void
    {
        //Excluir curso com base no id dele que é retornado pela própria aplicação, dessa forma, é feito por meio de 
        //um método GET ($superglobal $_GET), ao inves de POST. Deve-se verificar se o que é retornado pela aplicação é um id, do tipo inteiro, válido.
        // Para isso, usamos o filtro FILTER_VALIDATE_INT. 
        // IMPORTANTE, O CAMPO 'id' A BAIXO É REFERENTE AO ATRIBUTO DA CLASSE Curso, E NÃO AO name DO <form>
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        if($id === false || is_null($id)){ //ou seja, caso seja um id inválido ou nulo
            header('Localization:/listar-cursos');
            return;
        }

        // Find the course in the database (dois jeitos)
        // Porém, o getReference é bem mais rápido que o find()!
        // $curso = $this->entityManager->getRepository(Curso::class)->find($id); 
        $curso = $this->entityManager->getReference(Curso::class, $id);

        // Remove it and flush
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        header('Location:/listar-cursos', true, 302);
    }
}
/**
 * Superglobal $_GET
 * Todos os valores passados como query string params na URL estarão disponíveis neste array associativo
 */