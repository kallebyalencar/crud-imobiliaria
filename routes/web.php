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

    case '/cadastro':
        require_once '../app/Controllers/AuthController.php';
        $controller = new AuthController();
        $controller->cadastrar();
        break;

    case '/logout':
        require_once '../app/Controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;

    default:
        http_response_code(404);
        echo '404 - Página não encontrada';
        break;
}

?>