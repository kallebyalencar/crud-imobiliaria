<?php $base = '/tde-backend/crud-imobiliaria/public'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Imóvel - Bosque das Chaves</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/property.css">
</head>
<body>
    <?php require_once '../app/Views/partials/header.php'; ?>
    <main class="main-content product-page">
        <div class="content-main">
            <?php if (!isset($imovel)): ?>
                <p>Imóvel não encontrado.</p>
            <?php else: ?>
                <div id="product-container">
                    <div class="product-image">
                        <img src="<?= $base ?>/assets/img/<?= htmlspecialchars($imovel->imagem ?? '') ?>" alt="<?= htmlspecialchars($imovel->titulo) ?>">
                    </div>
                    <div class="product-info">
                        <h1><?= htmlspecialchars($imovel->titulo) ?></h1>
                        <p class="location">📍 <?= htmlspecialchars($imovel->cidade ?? '') ?> - <?= htmlspecialchars($imovel->estado ?? '') ?></p>
                        <p><?= htmlspecialchars($imovel->descricao ?? '') ?></p>
                        <div class="product-price">R$ <?= number_format($imovel->preco, 2, ',', '.') ?></div>
                        <?php if ($imovel->contato): ?>
                            <a href="https://wa.me/55<?= preg_replace('/\D/', '', $imovel->contato) ?>" target="_blank">
                                <button class="btn">Falar com anunciante</button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>