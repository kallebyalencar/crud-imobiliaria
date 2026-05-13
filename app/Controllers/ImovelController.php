<?php

require_once '../config/database.php';
require_once '../app/Models/Imovel.php';
require_once '../app/DAO/ImovelDAO.php';

class ImovelController
{
    private ImovelDAO $dao;

    public function __construct()
    {
        $conn = Conexao::getConn();
        $this->dao = new ImovelDAO($conn);
    }

    public function index()
    {
        $imoveis = $this->dao->listarTodos();
        require_once '../app/Views/imoveis/properties.php';
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /tde-backend/crud-imobiliaria/public/imoveis');
            exit;
        }

        $imovel = $this->dao->buscarPorId($id);
        require_once '../app/Views/imoveis/property.php';
    }

    public function gerenciar()
    {
        $usuario_id = $_SESSION['usuario_id'];
        $imoveis = $this->dao->listarPorUsuario($usuario_id);
        require_once '../app/Views/imoveis/crud.php';
    }

    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imovel = new Imovel();
            $imovel->usuario_id = $_SESSION['usuario_id'];
            $imovel->titulo     = trim($_POST['titulo'] ?? '');
            $imovel->tipo       = $_POST['tipo'] ?? '';
            $imovel->finalidade = $_POST['finalidade'] ?? '';
            $imovel->preco      = (float)($_POST['preco'] ?? 0);
            $imovel->status     = $_POST['status'] ?? 'Disponível';
            $imovel->quartos    = (int)($_POST['quartos'] ?? 0);
            $imovel->banheiros  = (int)($_POST['banheiros'] ?? 0);
            $imovel->vagas      = (int)($_POST['vagas'] ?? 0);
            $imovel->area       = (float)($_POST['area'] ?? 0);
            $imovel->bairro     = trim($_POST['bairro'] ?? '');
            $imovel->cidade     = trim($_POST['cidade'] ?? '');
            $imovel->estado     = $_POST['estado'] ?? '';
            $imovel->descricao  = trim($_POST['descricao'] ?? '');
            $imovel->codigo     = trim($_POST['codigo'] ?? '');
            $imovel->contato    = trim($_POST['contato'] ?? '');
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
                $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                $nomeArquivo = uniqid() . '.' . $ext;
                $destino = __DIR__ . '/../../public/assets/img/' . $nomeArquivo;
                move_uploaded_file($_FILES['imagem']['tmp_name'], $destino);
                $imovel->imagem = $nomeArquivo;
            } else {
                $imovel->imagem = 'hero-banner.png';
            }
            $this->dao->cadastrar($imovel);
            header('Location: /tde-backend/crud-imobiliaria/public/meus-imoveis');
            exit;
        }
    }

    public function deletar()
    {
        $id = (int)($_POST['id'] ?? 0);
        $usuario_id = $_SESSION['usuario_id'];
        $this->dao->deletar($id, $usuario_id);
        http_response_code(200);
        exit;
    }
}
