<?php 

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Controller\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\Common\Cache\FileCache;
use Doctrine\ORM\EntityManager;

class RealizarLogin extends ControllerComHtml implements InterfaceControladorRequisicao
{
    use FlashMessageTrait;

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

            $classe = "danger";
            $mensagem = "O e-mail digitado não é válido.";
            $this->mensagemSession($classe,$mensagem);
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

            $classe = "danger";
            $mensagem = "E-mail ou senha inválidos.";
            $this->mensagemSession($classe,$mensagem);
            header('Location: /login');

            return;
        }
        
        $_SESSION['logado'] = true;
        header('Location: /listar-cursos');

    }

}