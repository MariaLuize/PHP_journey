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
        //========= pegar dados do formulario =========
        // $_REQUEST  a variável $_REQUEST que traz os dados de $_POST, da query string e de cookies., $_POST retorna direto o que foi enviado no formulário da página HTML
                                /* ANTIGO */
        // $descricao = $_POST['descricao'];  // $_POST[name="descricao" do <input> do <form>]
                            /* NOVO, COM FILTRO */
        // Objetivando limpar o que for enviado pelo <form>, retirando possíveis tags html, o PHP oferece o filtro FILTER_SANITIZE_STRING
        // filter_input filtra os dados recebidos da requisição HTTP
        $descricao = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_STRING);
      

        //========= montar objeto Curso (model) =========
        $curso  = new Curso();
        $curso->setDescricao($descricao);

        //========= Verificação de presençade id na URL =========
        $id     = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

        if($id !== false && !is_null($id)){ 
            // se tenho id, então quero atualizar o dado no banco
            $curso->setId($id);
            // https://www.doctrine-project.org/projects/doctrine-orm/en/2.9/reference/working-with-objects.html#merging-entities
            $this->entityManager->merge($curso); 
        }else{
            //========= inserir no banco de dados(nesse caso, o Doctrine) =========
            $this->entityManager->persist($curso); //salva a instância $curso
        }

        $this->entityManager->flush(); //manda a instância $curso para o banco 

        // Redirecionamento para /listar-cursos
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Redirections
        // https://www.php.net/manual/en/function.header.php
        // 302:  status comum de redirecionamento é o 302, que significa "movido temporariamente" (na prática, apenas "redirecionar").
        header('Location:/listar-cursos', true, 302);

    }
}
