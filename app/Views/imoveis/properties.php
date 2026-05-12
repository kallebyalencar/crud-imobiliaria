<?php $base = '/tde-backend/crud-imobiliaria/public'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Imóveis - Bosque das Chaves</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/properties.css">
</head>
<body>
    <?php require_once '../app/Views/partials/header.php'; ?>
    <section class="all-properties">
        <div class="container">
            <h2 class="section-title">Todos os Imóveis</h2>
            <div class="properties-grid" id="all-properties-grid">
                <?php if (empty($imoveis)): ?>
                    <p>Nenhum imóvel cadastrado ainda.</p>
                <?php else: ?>
                    <?php foreach ($imoveis as $imovel): ?>
                        <div class="property-card" onclick="window.location.href='<?= $base ?>/imovel?id=<?= $imovel->id ?>'">
                            <img src="<?= $base ?>/assets/img/<?= htmlspecialchars($imovel->imagem ?? 'hero-banner.png') ?>" alt="<?= htmlspecialchars($imovel->titulo) ?>">
                            <div class="property-info">
                                <h3><?= htmlspecialchars($imovel->titulo) ?></h3>
                                <p><?= htmlspecialchars($imovel->descricao ?? '') ?></p>
                                <span class="location"><?= htmlspecialchars($imovel->cidade ?? '') ?></span>
                                <span class="price">R$ <?= number_format($imovel->preco, 2, ',', '.') ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</body>
</html>