<?php

class FavoritoDAO {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function favoritar(int $usuario_id, int $imovel_id): bool {
        $stmt = $this->conn->prepare(
            'INSERT INTO favoritos (usuario_id, imovel_id) VALUES (?, ?)'
        );
        return $stmt->execute([$usuario_id, $imovel_id]);
    }

    public function desfavoritar(int $usuario_id, int $imovel_id): bool {
        $stmt = $this->conn->prepare(
            'DELETE FROM favoritos WHERE usuario_id = ? AND imovel_id = ?'
        );
        return $stmt->execute([$usuario_id, $imovel_id]);
    }

    public function listarPorUsuario(int $usuario_id): array {
        $stmt = $this->conn->prepare(
            'SELECT * FROM favoritos WHERE usuario_id = ?'
        );
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Favorito::class);
    }
}

?>