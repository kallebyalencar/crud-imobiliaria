<?php

class HomeController
{
    public function index() {
        require_once '../app/Views/home/home-page.php';
    }

    public function sobre() {
        require_once '../app/Views/home/about.php';
    }

    public function perfil() {
        require_once '../app/Views/imoveis/perfil.php';
    }

    public function editarPerfil() {
        require_once '../app/Views/auth/editar.php';
    }
}
