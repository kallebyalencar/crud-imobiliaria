<?php
$base = '/tde-backend/crud-imobiliaria/public';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciar Imóveis - Bosque das Chaves</title>
  <link rel="stylesheet" href="<?= $base ?>/assets/css/reset.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/crud.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <?php require_once '../app/Views/partials/header.php'; ?>
  <main id="main-content">
    <section class="stats-bar">
      <div class="stats-container">
        <div class="stat-card"><span class="stat-icon">🏘️</span><div class="stat-info"><span class="stat-value" id="stat-total-val"><?= count($imoveis) ?></span><span class="stat-label">Total de Imóveis</span></div></div>
        <div class="stat-card"><span class="stat-icon">✅</span><div class="stat-info"><span class="stat-value" id="stat-disp-val"><?= count(array_filter($imoveis, fn($i) => $i->status === 'Disponível')) ?></span><span class="stat-label">Disponíveis</span></div></div>
        <div class="stat-card"><span class="stat-icon">💰</span><div class="stat-info"><span class="stat-value">R$ <?= count($imoveis) ? number_format(array_sum(array_map(fn($i) => $i->preco, $imoveis)) / count($imoveis), 2, ',', '.') : '0,00' ?></span><span class="stat-label">Valor Médio</span></div></div>
        <div class="stat-card"><span class="stat-icon">📊</span><div class="stat-info"><span class="stat-value">R$ <?= number_format(array_sum(array_map(fn($i) => $i->preco, $imoveis)), 2, ',', '.') ?></span><span class="stat-label">Portfólio Total</span></div></div>
      </div>
    </section>
    <div class="crud-layout">
      <aside class="sidebar-filters">
        <div class="filter-header"><h2>Filtros</h2><button class="btn-clear-filters" id="btn-clear-filters" type="button">Limpar</button></div>
        <div class="filter-group"><h3>Finalidade</h3>
          <label class="filter-radio"><input type="radio" name="finalidade" value="" checked> Todos</label>
          <label class="filter-radio"><input type="radio" name="finalidade" value="Venda"> Venda</label>
          <label class="filter-radio"><input type="radio" name="finalidade" value="Aluguel"> Aluguel</label>
        </div>
        <div class="filter-group"><h3>Tipo</h3>
          <label class="filter-check"><input type="checkbox" name="tipo" value="Casa"> 🏠 Casa</label>
          <label class="filter-check"><input type="checkbox" name="tipo" value="Apartamento"> 🏢 Apartamento</label>
          <label class="filter-check"><input type="checkbox" name="tipo" value="Comercial"> 🏪 Comercial</label>
          <label class="filter-check"><input type="checkbox" name="tipo" value="Terreno"> 🌳 Terreno</label>
        </div>
        <div class="filter-group"><h3>Status</h3>
          <label class="filter-check"><input type="checkbox" name="status" value="Disponível"> Disponível</label>
          <label class="filter-check"><input type="checkbox" name="status" value="Reservado"> Reservado</label>
          <label class="filter-check"><input type="checkbox" name="status" value="Vendido"> Vendido</label>
        </div>
        <div class="filter-group"><h3>Ordenar por</h3>
          <select id="sort-select" class="filter-select">
            <option value="data-desc">Mais recentes</option>
            <option value="preco-asc">Menor preço</option>
            <option value="preco-desc">Maior preço</option>
          </select>
        </div>
      </aside>
      <section class="imoveis-section">
        <div class="section-toolbar">
          <div class="toolbar-left">
            <h2 class="section-title">Meus Imóveis</h2>
            <span class="results-count"><?= count($imoveis) ?> imóvel(is) encontrado(s)</span>
          </div>
          <div class="toolbar-right">
            <button class="btn-novo-imovel" id="btn-novo" type="button">+ Novo Imóvel</button>
          </div>
        </div>
        <?php if (empty($imoveis)): ?>
          <div class="empty-state">
            <span class="empty-icon">🏚️</span>
            <h3>Nenhum imóvel cadastrado</h3>
            <p>Clique em "+ Novo Imóvel" para começar.</p>
          </div>
        <?php else: ?>
          <div class="imoveis-grid" id="imoveis-grid">
            <?php foreach ($imoveis as $imovel): ?>
              <article class="prop-card">
                <div class="card-img-wrap">
                  <img class="card-img" src="<?= $base ?>/assets/img/<?= htmlspecialchars($imovel->imagem ?? 'hero-banner.png') ?>" alt="<?= htmlspecialchars($imovel->titulo) ?>">
                  <span class="card-badge-status badge-disponivel"><?= htmlspecialchars($imovel->status) ?></span>
                  <span class="card-badge-fin"><?= htmlspecialchars($imovel->finalidade) ?></span>
                </div>
                <div class="card-body">
                  <h3 class="card-title"><?= htmlspecialchars($imovel->titulo) ?></h3>
                  <p class="card-location">📍 <?= htmlspecialchars($imovel->cidade ?? '') ?> - <?= htmlspecialchars($imovel->estado ?? '') ?></p>
                  <p class="card-price">R$ <?= number_format($imovel->preco, 2, ',', '.') ?></p>
                </div>
                <div class="card-footer">
                  <a href="<?= $base ?>/imovel?id=<?= $imovel->id ?>" class="card-btn card-btn-view">👁 Ver</a>
                  <button class="card-btn card-btn-del" onclick="deletarImovel(<?= $imovel->id ?>)">🗑️</button>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </section>
    </div>
  </main>

  <!-- MODAL FORM -->
  <div class="modal-overlay" id="modal-form" hidden>
    <div class="modal-box">
      <div class="modal-header">
        <h2 id="modal-form-title">Novo Imóvel</h2>
        <button class="modal-close" id="modal-form-close">&times;</button>
      </div>
      <form method="POST" action="<?= $base ?>/imovel/cadastrar">
        <div class="form-grid">
          <div class="form-group full-width"><label>Título *</label><input type="text" name="titulo" required></div>
          <div class="form-group"><label>Tipo *</label><select name="tipo" required><option value="">Selecione</option><option>Casa</option><option>Apartamento</option><option>Comercial</option><option>Terreno</option></select></div>
          <div class="form-group"><label>Finalidade *</label><select name="finalidade" required><option value="">Selecione</option><option>Venda</option><option>Aluguel</option></select></div>
          <div class="form-group"><label>Preço (R$) *</label><input type="number" name="preco" min="0" required></div>
          <div class="form-group"><label>Status</label><select name="status"><option>Disponível</option><option>Reservado</option><option>Vendido</option></select></div>
          <div class="form-group"><label>Quartos</label><input type="number" name="quartos" min="0" value="0"></div>
          <div class="form-group"><label>Banheiros</label><input type="number" name="banheiros" min="0" value="0"></div>
          <div class="form-group"><label>Vagas</label><input type="number" name="vagas" min="0" value="0"></div>
          <div class="form-group"><label>Área (m²)</label><input type="number" name="area" min="0" value="0"></div>
          <div class="form-group"><label>Bairro</label><input type="text" name="bairro"></div>
          <div class="form-group"><label>Cidade</label><input type="text" name="cidade"></div>
          <div class="form-group"><label>Estado</label><select name="estado"><option value="">Selecione</option><option>CE</option><option>SP</option><option>RJ</option><option>MG</option><option>BA</option><option>PE</option><option>PR</option><option>RS</option><option>SC</option></select></div>
          <div class="form-group"><label>Contato</label><input type="text" name="contato" placeholder="(00) 00000-0000"></div>
          <div class="form-group"><label>Código</label><input type="text" name="codigo"></div>
          <div class="form-group full-width"><label>Descrição</label><textarea name="descricao" rows="3"></textarea></div>
          <div class="form-group full-width"><label>URL da Imagem</label><input type="text" name="imagem"></div>
        </div>
        <div class="form-actions">
          <button type="button" class="btn-cancel" id="btn-cancel-form">Cancelar</button>
          <button type="submit" class="btn-save">Salvar Imóvel</button>
        </div>
      </form>
    </div>
  </div>

  <div class="toast-container" id="toast-container"></div>
  <script>
    const base = '<?= $base ?>';
    document.getElementById('btn-novo').addEventListener('click', () => {
      document.getElementById('modal-form').hidden = false;
    });
    document.getElementById('modal-form-close').addEventListener('click', () => {
      document.getElementById('modal-form').hidden = true;
    });
    document.getElementById('btn-cancel-form').addEventListener('click', () => {
      document.getElementById('modal-form').hidden = true;
    });
    function deletarImovel(id) {
      if (!confirm('Tem certeza que deseja excluir este imóvel?')) return;
      fetch(base + '/imovel/deletar', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'id=' + id
      }).then(() => window.location.reload());
    }
  </script>
</body>
</html>