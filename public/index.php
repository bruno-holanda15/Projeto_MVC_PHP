<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;

switch ($_SERVER['PATH_INFO']) {
    case '/listar-cursos':
        $controlador = new ListarCursos();
        $controlador->processaRequisicao();
        require_once __DIR__ . "/../view/cursos/listar-cursos.php";
        break;
    
    case '/novo-curso':
        $controlador = new FormularioInsercao();
        $controlador->processaRequisicao();
        require_once __DIR__ . "/../view/cursos/formulario.php";
        break;
        
    default:
        echo "Erro 404";
        break;
}