<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManager;

class FormularioInsercao implements InterfaceControladorRequisicao
{

    public function processaRequisicao():void
    {
        $titulo = "Novo Curso";
        require_once __DIR__ . "/../../view/cursos/formulario.php";

    }

}