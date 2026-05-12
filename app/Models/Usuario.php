<?php

class Usuario {
    public int $id;
    public string $nome;
    public string $email;
    public string $senha;
    public ?string $telefone;
    public string $created_at;
}