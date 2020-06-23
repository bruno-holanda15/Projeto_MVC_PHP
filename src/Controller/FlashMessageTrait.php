<?php

namespace Alura\Cursos\Controller;

trait FlashMessageTrait {

    public function mensagemSession(string $classe, string $mensagem): void
    {
        $_SESSION['tipo_mensagem'] = $classe;
        $_SESSION['mensagem'] = $mensagem;
    }

}