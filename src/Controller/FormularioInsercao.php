<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManager;

class FormularioInsercao extends ControllerComHtml implements InterfaceControladorRequisicao
{

    public function processaRequisicao():void
    {
        
        echo $this->renderizaHtml('/cursos/formulario.php',[
            'titulo' => 'Novo Curso'
        ]);

    }

}