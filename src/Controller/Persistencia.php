<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Controller\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManager;

class Persistencia implements InterfaceControladorRequisicao
{
    use FlashMessageTrait;

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        
    }    

    public function processaRequisicao(): void
    {
        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if(!is_null($id) && $id !== false){
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $mensagem = "Curso alterado";
        
        }else{
            $this->entityManager->persist($curso);
            $mensagem = "Curso criado";

        }

        $classe = "success";

        $this->mensagemSession($classe, $mensagem);
        $this->entityManager->flush();

        header( "Location: /listar-cursos", true , 302);

    }

}