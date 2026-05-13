<?php

switch ($route) {
    case '/':
    case '':
        require_once '../app/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;

    case '/imoveis':
        require_once '../app/Controllers/ImovelController.php';
        $controller = new ImovelController();
        $controller->index();
        break;

    case '/imovel':
        require_once '../app/Controllers/ImovelController.php';
        $controller = new ImovelController();
        $controller->show();
        break;


    case '/imovel/cadastrar':
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /tde-backend/crud-imobiliaria/public/login');
            exit;
        }
        require_once '../app/Controllers/ImovelController.php';
        $controller = new ImovelController();
        $controller->cadastrar();
        break;

    case '/imovel/deletar':
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /tde-backend/crud-imobiliaria/public/login');
            exit;
        }
        require_once '../app/Controllers/ImovelController.php';
        $controller = new ImovelController();
        $controller->deletar();
        break;

    case '/meus-imoveis':
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /tde-backend/crud-imobiliaria/public/login');
            exit;
        }
        require_once '../app/Controllers/ImovelController.php';
        $controller = new ImovelController();
        $controller->gerenciar();
        break;

    case '/login':
        require_once '../app/Controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;

    case '/cadastro':
        require_once '../app/Controllers/AuthController.php';
        $controller = new AuthController();
        $controller->cadastrar();
        break;

    case '/perfil':
        require_once '../app/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->perfil();
        break;

    case '/editar-perfil':
        require_once '../app/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->editarPerfil();
        break;        

    case '/logout':
        require_once '../app/Controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;

    case '/sobre':
        require_once '../app/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->sobre();
        break;

    default:
        http_response_code(404);
        echo '404 - Página não encontrada';
        break;
}

?>