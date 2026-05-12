<?php

class AuthController {

    /**
     * Exibe e processa a tela de Login.
     */
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $senha = $_POST['senha'] ?? '';

            // TODO: buscar usuário no banco e validar senha
            // Exemplo básico — substitua pela lógica real com DAO
            $_SESSION['erro_login'] = 'Funcionalidade de login em desenvolvimento.';
            header('Location: /tde-backend/crud-imobiliaria/public/login');
            exit;
        }

        require_once '../app/Views/auth/login.php';
    }

    /**
     * Exibe e processa o formulário de Cadastro de Usuário.
     */
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome      = trim($_POST['nome'] ?? '');
            $sobrenome = trim($_POST['sobrenome'] ?? '');
            $email     = trim($_POST['email'] ?? '');
            $telefone  = trim($_POST['telefone'] ?? '');
            $cpf       = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
            $senha     = $_POST['senha'] ?? '';
            $perfil    = $_POST['perfil'] ?? 'comprador';

            // TODO: validar dados e salvar no banco via DAO
            // Exemplo básico — substitua pela lógica real com UsuarioDAO
            $_SESSION['sucesso_cadastro'] = 'Cadastro realizado com sucesso!';
            header('Location: /tde-backend/crud-imobiliaria/public/login');
            exit;
        }

        require_once '../app/Views/auth/register.php';
    }

    /**
     * Encerra a sessão do usuário e redireciona para o login.
     */
    public function logout() {
        session_destroy();
        header('Location: /tde-backend/crud-imobiliaria/public/login');
        exit;
    }
}

?>
