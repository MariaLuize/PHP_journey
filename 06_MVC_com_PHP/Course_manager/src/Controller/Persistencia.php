<?php
namespace Alura\Cursos\Controller;

use \Alura\Cursos\Infra\EntityManagerCreator;
use \Alura\Cursos\Entity\Curso;

class Persistencia implements Interface_ControladorRequisicao
{
    private \Doctrine\ORM\EntityManagerInterface $entityManager;
    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();

    }

    public function processaRequisicao():void
    {
        //=========pegar dados do formulario=========
        // $_REQUEST  a variável $_REQUEST que traz os dados de $_POST, da query string e de cookies., $_POST retorna direto o que foi enviado no formulário da página HTML
        // $_POST[name="descricao" do <input> do <form>]
                                /* ANTIGO */
        // $descricao = $_POST['descricao'];
                            /* NOVO, COM FILTRO */
        // Objetivando limpar o que for enviado pelo <form>, retirando possíveis tags html, o PHP oferece o filtro FILTER_SANITIZE_STRING
        // filter_input filtra os dados recebidos da requisição HTTP
        $descricao = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_STRING);
      

        //=========montar objeto Curso (model)=========
        $curso = new Curso();
        $curso->setDescricao($descricao);

        //=========inserir no banco de dados(nesse caso, o Doctrine)=========
        $this->entityManager->persist($curso); //salva a instância $curso
        $this->entityManager->flush(); //manda a instância $curso para o banco 

        // Redirecionamento para /listar-cursos
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Redirections
        // https://www.php.net/manual/en/function.header.php
        // 302:  status comum de redirecionamento é o 302, que significa "movido temporariamente" (na prática, apenas "redirecionar").
        header('Location:/listar-cursos', true, 302);

    }
}
