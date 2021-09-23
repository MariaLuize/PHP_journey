<?php

use Alura\Cursos\Controller\{ListarCursos,FormularioInsercaoCurso,Persistencia};

return [
    '/listar-cursos'=> ListarCursos::class,
    '/novo-curso'   => FormularioInsercaoCurso::class,
    '/salvar-curso' => Persistencia::class,
];
