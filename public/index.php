<?php

switch ($_SERVER['PATH_INFO']) {
    case '/listar-cursos':
        require_once "listar-cursos.php";
        break;
    
    case '/novo-curso':
        require_once "formulario-criar-curso.php";
        break;
        
    default:
        echo "Erro 404";
        break;
}