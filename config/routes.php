<?php

use Alura\Cursos\Controller\ExcluirCurso;
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\FormularioEdicao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;

return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/editar-curso' => FormularioEdicao::class,
    '/excluir-curso' => ExcluirCurso::class
];
