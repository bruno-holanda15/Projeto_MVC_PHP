<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManager;

class ListarCursos extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeCursos = $entityManager
            ->getRepository(Curso::class);
    }

    public function processaRequisicao():void
    {
        $cursos = $this->repositorioDeCursos->findAll();

        echo $this->renderizaHtml('/cursos/listar-cursos.php',[
            'cursos' => $cursos,
            'titulo' => 'Lista de Cursos'
        ]);

        //Utilizando método da classe herdade ControllerComHtml
        // require_once __DIR__ . "/../../view/cursos/listar-cursos.php";

    }


}