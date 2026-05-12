<?php $base = '/tde-backend/crud-imobiliaria/public'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Vendedor - Bosque das Chaves</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/perfil.css">
</head>
<body>
<?php require_once '../app/Views/partials/header.php'; ?>
<main class="perfil-page">
    <section class="perfil-card">
        <section class="perfil-capa"><span>Imagem de capa</span></section>
        <section class="perfil-dados">
            <div class="foto-vendedor">
                <img src="<?= $base ?>/assets/img/logo.jpeg" alt="Vendedor">
            </div>
            <div class="info-vendedor">
                <h1>Imobiliária 1</h1>
                <p>Vendedor verificado</p>
                <div class="dados-contato">
                    <span>contato@imobiliaria1.com</span>
                    <span>Juazeiro do Norte - CE</span>
                    <span>(88) 99999-9999</span>
                    <span>CRECI: 00000</span>
                </div>
            </div>
            <button class="editar-perfil" onclick="window.location.href='<?= $base ?>/editar-perfil'">Editar perfil</button>
        </section>
        <section class="sobre-vendedor">
            <h2>Sobre o vendedor</h2>
            <p>A Imobiliária 1 conecta pessoas aos seus lares ideais, oferecendo imóveis para venda e aluguel com atendimento personalizado.</p>
        </section>
        <section class="imoveis-section">
            <h2>Imóveis para alugar</h2>
            <div class="carrossel-imoveis">
                <?php if (isset($imoveisAluguel) && !empty($imoveisAluguel)): ?>
                    <?php foreach ($imoveisAluguel as $imovel): ?>
                        <div class="imovel-card" onclick="window.location.href='<?= $base ?>/imovel?id=<?= $imovel->id ?>'">
                            <img src="<?= $base ?>/assets/img/<?= htmlspecialchars($imovel->imagem ?? 'hero-banner.png') ?>" alt="<?= htmlspecialchars($imovel->titulo) ?>">
                            <div class="imovel-info">
                                <h3><?= htmlspecialchars($imovel->titulo) ?></h3>
                                <p><?= htmlspecialchars($imovel->descricao ?? '') ?></p>
                                <strong>R$ <?= number_format($imovel->preco, 2, ',', '.') ?>/mês</strong>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
        <section class="imoveis-section">
            <h2>Imóveis à venda</h2>
            <div class="carrossel-imoveis">
                <?php if (isset($imoveisVenda) && !empty($imoveisVenda)): ?>
                    <?php foreach ($imoveisVenda as $imovel): ?>
                        <div class="imovel-card" onclick="window.location.href='<?= $base ?>/imovel?id=<?= $imovel->id ?>'">
                            <img src="<?= $base ?>/assets/img/<?= htmlspecialchars($imovel->imagem ?? 'hero-banner.png') ?>" alt="<?= htmlspecialchars($imovel->titulo) ?>">
                            <div class="imovel-info">
                                <h3><?= htmlspecialchars($imovel->titulo) ?></h3>
                                <p><?= htmlspecialchars($imovel->descricao ?? '') ?></p>
                                <strong>R$ <?= number_format($imovel->preco, 2, ',', '.') ?></strong>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </section>
</main>
</body>
</html>