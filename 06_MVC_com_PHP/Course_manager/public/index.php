<?php
// O ponto de entrada em nossa aplicação. 
// Toda e qualquer requisição que chegar em nosso servidor passará pelo arquivo index.php.
// Se na URL não foi especificado um arquivo, o servidor PHP automaticamente chamará o arquivo index.php;

// Com o PHP, temos acesso a uma variável global chamada $_SERVER, que nos traz diversos dados do servidor.
// em PATH_INFO ("informação do caminho") temos exatamente a URL que está sendo acessada. Portanto, se passarmos 
// uma URL http://localhost:8080/listar-cursos, o PATH_INFO será /listar-cursos.

switch($_SERVER['PATH_INFO']){
    case '/listar-cursos':
        require 'listar-cursos.php';
        break;
    
    case '/novo-curso':
        require 'formulario-novo-curso.php';
        break;
    
    default :
        echo 'Error 404';
        break;
}