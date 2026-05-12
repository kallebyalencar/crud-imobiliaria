<?php

class AuthController {

    public function login() {
        require_once '../app/Views/auth/login.php';
    }

    public function cadastrar() {
        require_once '../app/Views/auth/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /tde-backend/crud-imobiliaria/public/');
        exit;
    }
}

?>