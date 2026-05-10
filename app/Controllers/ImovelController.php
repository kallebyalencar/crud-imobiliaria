<?php

require_once '../config/database.php';
require_once '../app/Models/Imovel.php';
require_once '../app/DAO/ImovelDAO.php';

class ImovelController {
    private ImovelDAO $dao;

    public function __construct() {
        $conn = Conexao::getConn();
        $this->dao = new ImovelDAO($conn);
    }

    public function index() {
        $imoveis = $this->dao->listarTodos();
        require_once '../app/Views/imoveis/properties.php';
    }

    public function show() {
        $id = $_GET['id'] ?? null;

        if(!$id) {
            header('Location: /tde-backend/crud-imobiliaria/public/imoveis');
            exit;
        }

        $imovel = $this->dao->buscarPorId($id);
        require_once '../app/Views/imoveis/property.php';
    }
}

?>