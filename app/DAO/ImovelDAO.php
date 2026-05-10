<?php 

class ImovelDAO {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function listarTodos(): array {
        $stmt = $this->conn->query('SELECT * FROM imoveis ORDER BY created_at DESC');
        return $stmt->fetchAll(PDO::FETCH_CLASS, Imovel::class); 
    }

    public function buscarPorId($id): ?Imovel {
        $stmt = $this->conn->prepare('SELECT * FROM imoveis WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetchObject(Imovel::class) ?: null;
    }

     public function cadastrar(Imovel $imovel): bool {
        $stmt = $this->conn->prepare(
            'INSERT INTO imoveis (usuario_id, titulo, tipo, finalidade, preco, status, quartos, banheiros, vagas, area, bairro, cidade, estado, descricao, codigo, contato, imagem)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
        );
        return $stmt->execute([
            $imovel->usuario_id, $imovel->titulo, $imovel->tipo,
            $imovel->finalidade, $imovel->preco, $imovel->status,
            $imovel->quartos, $imovel->banheiros, $imovel->vagas,
            $imovel->area, $imovel->bairro, $imovel->cidade,
            $imovel->estado, $imovel->descricao, $imovel->codigo,
            $imovel->contato, $imovel->imagem
        ]);
    }

    public function atualizar(Imovel $imovel): bool {
        $stmt = $this->conn->prepare(
            'UPDATE imoveis SET titulo=?, tipo=?, finalidade=?, preco=?, status=?, quartos=?, banheiros=?, vagas=?, area=?, bairro=?, cidade=?, estado=?, descricao=?, codigo=?, contato=?, imagem=?
            WHERE id=? AND usuario_id=?'
        );
        return $stmt->execute([
            $imovel->titulo, $imovel->tipo, $imovel->finalidade,
            $imovel->preco, $imovel->status, $imovel->quartos,
            $imovel->banheiros, $imovel->vagas, $imovel->area,
            $imovel->bairro, $imovel->cidade, $imovel->estado,
            $imovel->descricao, $imovel->codigo, $imovel->contato,
            $imovel->imagem, $imovel->id, $imovel->usuario_id
        ]);
    }

     public function deletar(int $id, int $usuario_id): bool {
        $stmt = $this->conn->prepare('DELETE FROM imoveis WHERE id = ? AND usuario_id = ?');
        return $stmt->execute([$id, $usuario_id]);
    }
}

?>