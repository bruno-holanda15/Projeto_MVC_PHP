<?php 

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\Common\Cache\FileCache;
use Doctrine\ORM\EntityManager;

class RealizarLogin extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $repositorioUsuario;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioUsuario = $entityManager->getRepository(Usuario::class);
        
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );
        
        if(is_null($email) || $email === false){
            echo "O e-mail digitado não é válido.";
            return;
        }

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );

        /** @var Usuario $usuario */
        $usuario = $this->repositorioUsuario->findOneBy([
            'email'=> $email
        ]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            echo "Senha ou e-mail inválidos.";
            return;
        }
        
        header('Location: /listar-cursos');

    }

}