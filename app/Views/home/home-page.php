<?php
$base = '/tde-backend/crud-imobiliaria/public';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Bosque das Chaves</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/responsive.css">
</head>
<body>
    <?php require_once '../app/Views/partials/header.php'; ?>
    <main class="main-content">
        <section class="hero-banner">
            <div class="hero-slider">
                <div class="slide">
                    <img src="<?= $base ?>/assets/img/hero-banner-maior.png" alt="hero-banner">
                </div>
                <div class="hero-content">
                    <h2>Alugue seu imóvel dos sonhos <br> com a Bosque das Chaves</h2>
                    <a href="<?= $base ?>/sobre"><button class="more-info" type="button">Saiba Mais</button></a>
                </div>
            </div>
        </section>
        <section class="client-options">
            <div class="container">
                <div class="options-grid" id="client-options-grid">
                    <div class="option-item">
                        <img src="<?= $base ?>/assets/img/key-grid.jpg" alt="Opção 1">
                        <h3>Anuncie seu imóvel com a gente</h3>
                    </div>
                    <div class="option-item">
                        <img src="<?= $base ?>/assets/img/conor-grid.jpg" alt="Opção 2">
                        <h3>Procurando um lar no cariri?</h3>
                    </div>
                    <div class="option-item">
                        <img src="<?= $base ?>/assets/img/purchase-grid.jpg" alt="Opção 3">
                        <h3>Quero comprar</h3>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured-properties">
            <div class="container">
                <h2 class="section-title">Imóveis em Destaque</h2>
                <div class="properties-grid" id="featured-properties-grid">
                    <?php if (isset($imoveis) && !empty($imoveis)): ?>
                        <?php foreach ($imoveis as $imovel): ?>
                            <div class="property-card" onclick="window.location.href='<?= $base ?>/imovel?id=<?= $imovel->id ?>'">
                                <img src="<?= $base ?>/assets/img/<?= htmlspecialchars($imovel->imagem ?? '') ?>" alt="<?= htmlspecialchars($imovel->titulo) ?>">
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
        <section class="benefits">
            <div class="benefits-list">
                <div class="benefits-image">
                    <img src="<?= $base ?>/assets/img/white-logo.png" alt="white-logo">
                </div>
                <div class="benefit-item">
                    <h3>Ambiente Personalizado</h3>
                    <p>O espaço já vem decorado de acordo com o tema escolhido, garantindo uma imersão completa e sem a necessidade de grandes preparativos.</p>
                </div>
            </div>
        </section>
    </main>
    <footer class="main-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h4>Fale Conosco</h4>
                    <div class="e-mail">
                        <a href="mailto:giselle.alves@aluno.unifapce.edu.br">giselle.alves@aluno.unifapce.edu.br</a>
                    </div>
                    <div class="phone">
                        <a href="https://wa.me/5588994429502">(88)99442-9502</a>
                    </div>
                </div>
                <div class="footer-column">
                    <h4>Formas de Pagamento</h4>
                </div>
                <div class="footer-logo">
                    <img src="<?= $base ?>/assets/img/brazil-map.png" alt="mapa">
                </div>
            </div>
        </div>
        <div class="container-bottom">
            <div class="footer-bottom">
                <hr>
                <p>&copy; 2024 Bosque das Chaves. Todos os direitos reservados.</p>
                <p>Os produtos anunciados nesse site são fictícios e fazem parte de um projeto para estudos</p>
            </div>
        </div>
    </footer>
</body>
</html>