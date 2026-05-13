<?php $base = '/tde-backend/crud-imobiliaria/public'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($imovel->titulo ?? 'Imóvel') ?> - Bosque das Chaves</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/property.css">
    <style>
        .property-detail {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 24px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: start;
        }

        .property-detail img {
            width: 100%;
            border-radius: 16px;
            object-fit: cover;
            max-height: 400px;
        }

        .property-info-box {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .property-info-box h1 {
            font-size: 28px;
            color: #4d6543;
            font-weight: bold;
        }

        .property-info-box .price {
            font-size: 26px;
            font-weight: bold;
            color: #8C6441;
        }

        .property-info-box .location {
            color: #6b6b6b;
            font-size: 15px;
        }

        .property-info-box .descricao {
            color: #3d2415;
            font-size: 15px;
            line-height: 1.6;
        }

        .specs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .spec-item {
            background: #f5f3ef;
            border-radius: 10px;
            padding: 12px;
            text-align: center;
        }

        .spec-item span {
            display: block;
            font-size: 12px;
            color: #6b6b6b;
            text-transform: uppercase;
        }

        .spec-item strong {
            font-size: 18px;
            color: #4d6543;
        }

        .badge-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .badge {
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .badge-tipo {
            background: #e8f0e5;
            color: #4d6543;
        }

        .badge-fin {
            background: #fef3e2;
            color: #8C6441;
        }

        .badge-status {
            background: #22c55e;
            color: #fff;
        }

        .btn-whats {
            display: inline-block;
            margin-top: 10px;
            padding: 14px 28px;
            background: #25D366;
            color: #fff;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            text-decoration: none;
        }

        .btn-whats:hover {
            background: #1ebe5d;
        }

        .btn-voltar {
            display: inline-block;
            margin: 20px 24px;
            color: #4d6543;
            font-weight: bold;
            text-decoration: none;
        }

        @media(max-width:768px) {
            .property-detail {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <?php require_once '../app/Views/partials/header.php'; ?>
    <a href="<?= $base ?>/imoveis" class="btn-voltar">← Voltar para listagem</a>
    <?php if (!isset($imovel) || !$imovel): ?>
        <p style="text-align:center; padding:40px;">Imóvel não encontrado.</p>
    <?php else: ?>
        <div class="property-detail">
            <div>
                <img src="<?= $base ?>/assets/img/<?= htmlspecialchars($imovel->imagem ?? 'hero-banner.png') ?>" alt="<?= htmlspecialchars($imovel->titulo) ?>">
            </div>
            <div class="property-info-box">
                <div class="badge-row">
                    <span class="badge badge-tipo"><?= htmlspecialchars($imovel->tipo ?? '') ?></span>
                    <span class="badge badge-fin"><?= htmlspecialchars($imovel->finalidade ?? '') ?></span>
                    <span class="badge badge-status"><?= htmlspecialchars($imovel->status ?? '') ?></span>
                </div>
                <h1><?= htmlspecialchars($imovel->titulo) ?></h1>
                <p class="location">📍 <?= htmlspecialchars($imovel->bairro ?? '') ?> <?= $imovel->bairro ? ',' : '' ?> <?= htmlspecialchars($imovel->cidade ?? '') ?> - <?= htmlspecialchars($imovel->estado ?? '') ?></p>
                <p class="price">R$ <?= number_format($imovel->preco, 2, ',', '.') ?><?= $imovel->finalidade === 'Aluguel' ? '/mês' : '' ?></p>
                <?php if ($imovel->descricao): ?>
                    <p class="descricao"><?= htmlspecialchars($imovel->descricao) ?></p>
                <?php endif; ?>
                <div class="specs-grid">
                    <?php if ($imovel->quartos): ?><div class="spec-item"><strong><?= $imovel->quartos ?></strong><span>Quartos</span></div><?php endif; ?>
                    <?php if ($imovel->banheiros): ?><div class="spec-item"><strong><?= $imovel->banheiros ?></strong><span>Banheiros</span></div><?php endif; ?>
                    <?php if ($imovel->vagas): ?><div class="spec-item"><strong><?= $imovel->vagas ?></strong><span>Vagas</span></div><?php endif; ?>
                    <?php if ($imovel->area): ?><div class="spec-item"><strong><?= $imovel->area ?>m²</strong><span>Área</span></div><?php endif; ?>
                    <?php if ($imovel->codigo): ?><div class="spec-item"><strong><?= htmlspecialchars($imovel->codigo) ?></strong><span>Código</span></div><?php endif; ?>
                </div>
                <?php if ($imovel->contato): ?>
                    <a href="https://wa.me/55<?= preg_replace('/\D/', '', $imovel->contato) ?>" target="_blank" class="btn-whats">💬 Falar no WhatsApp</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</body>

</html>