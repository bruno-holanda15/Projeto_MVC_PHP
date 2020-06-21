<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;

$caminho = $_SERVER['PATH_INFO'];

$rotas = require __DIR__ . "/../config/routes.php";

if(!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}

$classe = $rotas[$caminho];
/** @var InterfaceControladorRequisicao $controlador */
$controlador = new $classe();
$controlador->processaRequisicao();


// switch executando função de chamar as views, substituida pelo config routes , e lógica acima

// switch ($_SERVER['PATH_INFO']) {
//     case '/listar-cursos':
//         $controlador = new ListarCursos();
//         $controlador->processaRequisicao();
//         require_once __DIR__ . "/../view/cursos/listar-cursos.php";
//         break;
    
//     case '/novo-curso':
//         $controlador = new FormularioInsercao();
//         $controlador->processaRequisicao();
//         require_once __DIR__ . "/../view/cursos/formulario.php";
//         break;

//     case '/salvar-curso':
//         $controlador = new Persistencia();
//         $controlador->processaRequisicao();
//         break;
        
//     default:
//         echo "Erro 404";
//         break;
// }