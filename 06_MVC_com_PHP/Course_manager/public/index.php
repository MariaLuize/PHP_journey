<?php
require  __DIR__.'/../vendor/autoload.php';

/**
 * Arquitetural MVC: 
 * ->Model: Classes com a lógica de negócio e persistência
 * ->View: Arquivos com o código HTML
 * ->Controller: Classes que ligam o Model e View
*/

// O ponto de entrada em nossa aplicação é chamado de FrontController (ou de Dispatcher), e é o arquivo index.php 
// Toda e qualquer requisição que chegar em nosso servidor passará pelo arquivo index.php.
// Se na URL não foi especificado um arquivo, o servidor PHP automaticamente chamará o arquivo index.php;

// Com o PHP, temos acesso a uma variável global chamada $_SERVER, que nos traz diversos dados do servidor.
// em PATH_INFO ("informação do caminho") temos exatamente a URL que está sendo acessada. Portanto, se passarmos 
// uma URL http://localhost:8080/listar-cursos, o PATH_INFO será /listar-cursos.

use Alura\Cursos\Controller\{ListarCursos,FormularioInsercaoCurso};

switch($_SERVER['PATH_INFO']){
    case '/listar-cursos': //página inicial
        $controller = new ListarCursos();
        $controller->processaRequisicao();
        // require 'listar-cursos.php';
        break;
    
    case '/novo-curso':
        $controller = new FormularioInsercaoCurso();
        $controller->processaRequisicao();
        // require 'formulario-novo-curso.php';
        break;
    
    default :
        echo 'Error 404';
        break;
}