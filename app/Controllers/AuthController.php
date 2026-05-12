<?php

require_once '../app/Models/Usuario.php';
require_once '../app/DAO/UsuarioDAO.php';

class AuthController {

    private UsuarioDAO $dao;

    public function __construct() {
        $conn = Conexao::getConn();
        $this->dao = new UsuarioDAO($conn);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $senha = $_POST['senha'] ?? '';

            $usuario = $this->dao->buscarPorEmail($email);

            if (!$usuario || !password_verify($senha, $usuario->senha)) {
                $_SESSION['erro_login'] = 'E-mail ou senha incorretos.';
                header('Location: /tde-backend/crud-imobiliaria/public/login');
                exit;
            }

            $_SESSION['usuario_id'] = $usuario->id;
            $_SESSION['usuario_nome'] = $usuario->nome;
            header('Location: /tde-backend/crud-imobiliaria/public/');
            exit;
        }
        require_once '../app/Views/auth/login.php';
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome     = trim($_POST['nome'] ?? '');
            $email    = trim($_POST['email'] ?? '');
            $senha    = $_POST['senha'] ?? '';
            $telefone = trim($_POST['telefone'] ?? '');

            $existente = $this->dao->buscarPorEmail($email);
            if ($existente) {
                $_SESSION['erro_cadastro'] = 'E-mail já cadastrado.';
                header('Location: /tde-backend/crud-imobiliaria/public/cadastro');
                exit;
            }

            $usuario = new Usuario();
            $usuario->nome     = $nome;
            $usuario->email    = $email;
            $usuario->senha    = password_hash($senha, PASSWORD_DEFAULT);
            $usuario->telefone = $telefone;

            $this->dao->cadastrar($usuario);

            $_SESSION['sucesso_cadastro'] = 'Conta criada com sucesso! Faça login.';
            header('Location: /tde-backend/crud-imobiliaria/public/login');
            exit;
        }
        require_once '../app/Views/auth/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /tde-backend/crud-imobiliaria/public/');
        exit;
    }
}