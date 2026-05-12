<?php

class UsuarioDAO {
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function buscarPorEmail(string $email): ?Usuario {
        $stmt = $this->conn->prepare('SELECT * FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetchObject(Usuario::class) ?: null;
    }

    public function cadastrar(Usuario $usuario): bool {
        $stmt = $this->conn->prepare(
            'INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)'
        );
        return $stmt->execute([
            $usuario->nome,
            $usuario->email,
            $usuario->senha,
            $usuario->telefone
        ]);
    }
}