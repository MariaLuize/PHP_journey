<?php

use Alura\Cursos\Controller\{
    ListarCursos,
    FormularioInsercaoCurso,
    Persistencia, 
    ExcluirCurso,
    FormularioEdicaoCurso};

return [
    '/listar-cursos'=> ListarCursos::class,
    '/novo-curso'   => FormularioInsercaoCurso::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => ExcluirCurso::class,
    '/update-curso' => FormularioEdicaoCurso::class,
];
