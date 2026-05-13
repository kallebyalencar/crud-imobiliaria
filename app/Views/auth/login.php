<?php
$base = '/tde-backend/crud-imobiliaria/public';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bosque das Chaves</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/login.css">
</head>

<body>
    <?php require_once '../app/Views/partials/header.php'; ?>
    <section class="login">
        <div class="login-container">
            <h2>Login</h2>
            <?php if (isset($_SESSION['sucesso_cadastro'])): ?>
                <p style="color:green; text-align:center; margin-bottom:10px;">
                    <?= $_SESSION['sucesso_cadastro'] ?>
                </p>
                <?php unset($_SESSION['sucesso_cadastro']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['erro_login'])): ?>
                <p class="erro"><?= $_SESSION['erro_login'] ?></p>
                <?php unset($_SESSION['erro_login']); ?>
            <?php endif; ?>
            <form method="POST" action="<?= $base ?>/login">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="E-mail" required>
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Entrar</button>
            </form>
            <p>Não tem uma conta? <a href="<?= $base ?>/cadastro">Cadastre-se</a></p>
        </div>
    </section>
</body>

</html>