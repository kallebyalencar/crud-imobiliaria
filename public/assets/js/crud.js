/**
 * crud.js — Verde Imobiliaria CRUD
 * Gerenciamento completo de imóveis com localStorage
 */

'use strict';

/* ==============================
   DATA — 5 imóveis de exemplo
   ============================== */
const IMOVEIS_INICIAIS = [
  {
    id: 1,
    titulo: 'Casa no Bosque',
    tipo: 'Casa',
    finalidade: 'Venda',
    preco: 500000,
    status: 'Disponível',
    quartos: 3,
    banheiros: 2,
    vagas: 2,
    area: 180,
    bairro: 'Verde Imobiliaria',
    cidade: 'Curitiba',
    estado: 'PR',
    descricao: 'Linda casa com 3 quartos, piscina e churrasqueira em ambiente arborizado.',
    codigo: 'BDC-001',
    contato: '(41) 99999-0001',
    imagem: 'public/assets/img/casa-no-bosque.jpg',
    dataCadastro: new Date('2025-01-10').toISOString()
  },
  {
    id: 2,
    titulo: 'Apartamento Central',
    tipo: 'Apartamento',
    finalidade: 'Aluguel',
    preco: 950,
    status: 'Disponível',
    quartos: 2,
    banheiros: 1,
    vagas: 1,
    area: 65,
    bairro: 'Centro',
    cidade: 'Curitiba',
    estado: 'PR',
    descricao: 'Apartamento moderno com 2 quartos e vista para a cidade.',
    codigo: 'BDC-002',
    contato: '(41) 99999-0002',
    imagem: 'public/assets/img/apartment1.jpg',
    dataCadastro: new Date('2025-02-15').toISOString()
  },
  {
    id: 3,
    titulo: 'Casa Aconchegante',
    tipo: 'Casa',
    finalidade: 'Venda',
    preco: 320000,
    status: 'Reservado',
    quartos: 2,
    banheiros: 1,
    vagas: 1,
    area: 120,
    bairro: 'Zona Rural',
    cidade: 'Almirante Tamandaré',
    estado: 'PR',
    descricao: 'Casa com portas redondas, telhado verde e um jardim muito aconchegante.',
    codigo: 'BDC-003',
    contato: '(41) 99999-0003',
    imagem: 'public/assets/img/conor-grid.jpg',
    dataCadastro: new Date('2025-03-05').toISOString()
  },
  {
    id: 4,
    titulo: 'Ponto Comercial Histórico',
    tipo: 'Comercial',
    finalidade: 'Aluguel',
    preco: 2500,
    status: 'Disponível',
    quartos: 0,
    banheiros: 2,
    vagas: 5,
    area: 300,
    bairro: 'Vilarejo',
    cidade: 'Curitiba',
    estado: 'PR',
    descricao: 'Ponto comercial histórico com ambiente rústico e autêntico, ideal para restaurantes.',
    codigo: 'BDC-004',
    contato: '(41) 99999-0004',
    imagem: 'public/assets/img/hogs-head.jpg',
    dataCadastro: new Date('2025-03-20').toISOString()
  },
  {
    id: 5,
    titulo: 'Terreno Privilegiado',
    tipo: 'Terreno',
    finalidade: 'Venda',
    preco: 150000,
    status: 'Disponível',
    quartos: 0,
    banheiros: 0,
    vagas: 0,
    area: 500,
    bairro: 'Sítio Cercado',
    cidade: 'Curitiba',
    estado: 'PR',
    descricao: 'Terreno plano em localização privilegiada, com toda infraestrutura disponível.',
    codigo: 'BDC-005',
    contato: '(41) 99999-0005',
    imagem: 'public/assets/img/purchase-grid.jpg',
    dataCadastro: new Date('2025-04-01').toISOString()
  }
];

const STORAGE_KEY = 'bdc_imoveis';

/* ==============================
   STATE
   ============================== */
let state = {
  imoveis: [],
  filtros: {
    busca: '',
    finalidade: '',
    tipos: [],
    status: [],
    ordem: 'data-desc'
  },
  viewMode: 'grid',
  editingId: null,
  deletingId: null
};

/* ==============================
   STORAGE
   ============================== */
function loadData() {
  try {
    const raw = localStorage.getItem(STORAGE_KEY);
    state.imoveis = raw ? JSON.parse(raw) : JSON.parse(JSON.stringify(IMOVEIS_INICIAIS));
    if (!raw) saveData();
  } catch {
    state.imoveis = JSON.parse(JSON.stringify(IMOVEIS_INICIAIS));
  }
}

function saveData() {
  localStorage.setItem(STORAGE_KEY, JSON.stringify(state.imoveis));
}

/* ==============================
   HELPERS
   ============================== */
function nextId() {
  if (!state.imoveis.length) return 1;
  return Math.max(...state.imoveis.map(i => i.id)) + 1;
}

function formatPreco(preco) {
  return preco.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}

function tipoEmoji(tipo) {
  const map = { 'Casa': '🏠', 'Apartamento': '🏢', 'Comercial': '🏪', 'Terreno': '🌳' };
  return map[tipo] || '🏘️';
}

function statusClass(status) {
  const map = { 'Disponível': 'badge-disponivel', 'Reservado': 'badge-reservado', 'Vendido': 'badge-vendido' };
  return map[status] || 'badge-disponivel';
}

/* ==============================
   FILTER & SORT
   ============================== */
function getFiltered() {
  let list = [...state.imoveis];
  const { busca, finalidade, tipos, status, ordem } = state.filtros;

  if (busca.trim()) {
    const q = busca.toLowerCase();
    list = list.filter(i =>
      i.titulo.toLowerCase().includes(q) ||
      i.bairro.toLowerCase().includes(q) ||
      i.cidade.toLowerCase().includes(q) ||
      (i.codigo && i.codigo.toLowerCase().includes(q))
    );
  }

  if (finalidade) list = list.filter(i => i.finalidade === finalidade);
  if (tipos.length) list = list.filter(i => tipos.includes(i.tipo));
  if (status.length) list = list.filter(i => status.includes(i.status));

  list.sort((a, b) => {
    if (ordem === 'preco-asc')  return a.preco - b.preco;
    if (ordem === 'preco-desc') return b.preco - a.preco;
    if (ordem === 'area-asc')   return a.area - b.area;
    if (ordem === 'area-desc')  return b.area - a.area;
    // data-desc (default)
    return new Date(b.dataCadastro) - new Date(a.dataCadastro);
  });

  return list;
}

/* ==============================
   STATS
   ============================== */
function updateStats() {
  const total = state.imoveis.length;
  const disp  = state.imoveis.filter(i => i.status === 'Disponível').length;
  const media = total ? state.imoveis.reduce((s, i) => s + i.preco, 0) / total : 0;
  const port  = state.imoveis.reduce((s, i) => s + i.preco, 0);

  document.getElementById('stat-total-val').textContent = total;
  document.getElementById('stat-disp-val').textContent  = disp;
  document.getElementById('stat-media-val').textContent = formatPreco(media);
  document.getElementById('stat-port-val').textContent  = formatPreco(port);
}

/* ==============================
   RENDER
   ============================== */
function render() {
  const grid    = document.getElementById('imoveis-grid');
  const empty   = document.getElementById('empty-state');
  const counter = document.getElementById('results-count');
  const list    = getFiltered();

  grid.innerHTML = '';
  counter.textContent = `${list.length} imóvel${list.length !== 1 ? 'is' : ''} encontrado${list.length !== 1 ? 's' : ''}`;

  if (!list.length) {
    empty.hidden = false;
    grid.hidden  = true;
    return;
  }

  empty.hidden = false;
  grid.hidden  = false;
  empty.hidden = true;

  list.forEach(im => {
    const card = buildCard(im);
    grid.appendChild(card);
  });

  updateStats();
}

function buildCard(im) {
  const article = document.createElement('article');
  article.classList.add('prop-card');
  article.setAttribute('role', 'listitem');
  article.setAttribute('data-id', im.id);

  const specs = [];
  if (im.quartos)   specs.push(`🛏 ${im.quartos}`);
  if (im.banheiros) specs.push(`🚿 ${im.banheiros}`);
  if (im.vagas)     specs.push(`🚗 ${im.vagas}`);
  if (im.area)      specs.push(`📐 ${im.area}m²`);

  const specsHtml = specs.map(s => `<span class="card-spec">${s}</span>`).join('');

  const imgSrc = im.imagem || 'public/assets/img/hero-banner.png';

  article.innerHTML = `
    <div class="card-img-wrap">
      <img class="card-img" src="${imgSrc}" alt="${im.titulo}" loading="lazy"
           onerror="this.src='public/assets/img/hero-banner.png'">
      <span class="card-badge-status ${statusClass(im.status)}">${im.status}</span>
      <span class="card-badge-fin">${im.finalidade}</span>
    </div>
    <div class="card-body">
      <div class="card-type-title">
        <span class="card-emoji">${tipoEmoji(im.tipo)}</span>
        <h3 class="card-title">${im.titulo}</h3>
      </div>
      <p class="card-location">📍 ${[im.bairro, im.cidade, im.estado].filter(Boolean).join(', ')}</p>
      ${specs.length ? `<div class="card-specs">${specsHtml}</div>` : ''}
      <p class="card-price">${formatPreco(im.preco)}${im.finalidade === 'Aluguel' ? '/mês' : ''}</p>
      ${im.codigo ? `<span class="card-code">Ref: ${im.codigo}</span>` : ''}
    </div>
    <div class="card-footer">
      <button class="card-btn card-btn-view" data-action="view" data-id="${im.id}" title="Ver detalhes">👁 Ver</button>
      <button class="card-btn card-btn-edit" data-action="edit" data-id="${im.id}" title="Editar">✏️</button>
      <button class="card-btn card-btn-del"  data-action="delete" data-id="${im.id}" title="Excluir">🗑️</button>
    </div>
  `;

  return article;
}

/* ==============================
   MODAL FORM — OPEN / POPULATE
   ============================== */
function openFormModal(id = null) {
  const modal = document.getElementById('modal-form');
  const title = document.getElementById('modal-form-title');
  state.editingId = id;

  if (id) {
    const im = state.imoveis.find(i => i.id === id);
    if (!im) return;
    title.textContent = 'Editar Imóvel';
    document.getElementById('form-id').value         = im.id;
    document.getElementById('form-titulo').value     = im.titulo;
    document.getElementById('form-tipo').value       = im.tipo;
    document.getElementById('form-finalidade').value = im.finalidade;
    document.getElementById('form-preco').value      = im.preco;
    document.getElementById('form-status').value     = im.status;
    document.getElementById('form-quartos').value    = im.quartos;
    document.getElementById('form-banheiros').value  = im.banheiros;
    document.getElementById('form-vagas').value      = im.vagas;
    document.getElementById('form-area').value       = im.area;
    document.getElementById('form-bairro').value     = im.bairro;
    document.getElementById('form-cidade').value     = im.cidade;
    document.getElementById('form-estado').value     = im.estado;
    document.getElementById('form-descricao').value  = im.descricao;
    document.getElementById('form-codigo').value     = im.codigo;
    document.getElementById('form-contato').value    = im.contato;
    document.getElementById('form-imagem').value     = im.imagem;
  } else {
    title.textContent = 'Novo Imóvel';
    document.getElementById('imovel-form').reset();
    document.getElementById('form-id').value = '';
  }

  clearFormErrors();
  modal.hidden = false;
  document.getElementById('form-titulo').focus();
}

function closeFormModal() {
  document.getElementById('modal-form').hidden = true;
  state.editingId = null;
}

/* ==============================
   MODAL DETALHES
   ============================== */
function openDetModal(id) {
  const im = state.imoveis.find(i => i.id === id);
  if (!im) return;
  state.editingId = id;

  const specs = [
    { label: 'Tipo',      val: tipoEmoji(im.tipo) + ' ' + im.tipo },
    { label: 'Área',      val: im.area ? im.area + ' m²' : '—' },
    { label: 'Quartos',   val: im.quartos || '—' },
    { label: 'Banheiros', val: im.banheiros || '—' },
    { label: 'Vagas',     val: im.vagas || '—' },
    { label: 'Status',    val: im.status }
  ];

  const specsHtml = specs.map(s =>
    `<div class="det-spec"><span class="det-spec-label">${s.label}</span><span class="det-spec-val">${s.val}</span></div>`
  ).join('');

  const imgSrc = im.imagem || 'public/assets/img/hero-banner.png';

  document.getElementById('modal-det-body').innerHTML = `
    <img class="det-img" src="${imgSrc}" alt="${im.titulo}"
         onerror="this.src='public/assets/img/hero-banner.png'">
    <div class="det-badges">
      <span class="det-badge det-badge-tipo">${tipoEmoji(im.tipo)} ${im.tipo}</span>
      <span class="det-badge det-badge-fin">${im.finalidade}</span>
      <span class="card-badge-status ${statusClass(im.status)}" style="position:static;font-size:12px;padding:4px 12px;border-radius:20px;">${im.status}</span>
    </div>
    <h3 class="det-title">${im.titulo}</h3>
    <p class="det-location">📍 ${[im.bairro, im.cidade, im.estado].filter(Boolean).join(', ')}</p>
    <p class="det-desc">${im.descricao || 'Sem descrição.'}</p>
    <p class="det-price">${formatPreco(im.preco)}${im.finalidade === 'Aluguel' ? '/mês' : ''}</p>
    <div class="det-specs-grid">${specsHtml}</div>
    <div class="det-info-row">
      ${im.codigo  ? `<span>🔖 Ref: <strong>${im.codigo}</strong></span>` : ''}
      ${im.contato ? `<span>📞 <strong>${im.contato}</strong></span>` : ''}
    </div>
  `;

  document.getElementById('modal-det-title').textContent = im.titulo;
  document.getElementById('modal-detalhes').hidden = false;
}

function closeDetModal() {
  document.getElementById('modal-detalhes').hidden = true;
}

/* ==============================
   MODAL CONFIRM
   ============================== */
function openConfirmModal(id) {
  state.deletingId = id;
  document.getElementById('modal-confirm').hidden = false;
}

function closeConfirmModal() {
  document.getElementById('modal-confirm').hidden = true;
  state.deletingId = null;
}

/* ==============================
   FORM VALIDATION
   ============================== */
function validateForm() {
  let valid = true;
  clearFormErrors();

  const required = [
    { id: 'form-titulo',     msg: 'Título obrigatório' },
    { id: 'form-tipo',       msg: 'Selecione o tipo' },
    { id: 'form-finalidade', msg: 'Selecione a finalidade' },
    { id: 'form-preco',      msg: 'Informe o preço' }
  ];

  required.forEach(({ id, msg }) => {
    const el = document.getElementById(id);
    if (!el.value.trim()) {
      el.classList.add('error');
      valid = false;
    }
  });

  return valid;
}

function clearFormErrors() {
  document.querySelectorAll('.form-group input.error, .form-group select.error')
    .forEach(el => el.classList.remove('error'));
}

/* ==============================
   CRUD OPERATIONS
   ============================== */
function saveImovel(e) {
  e.preventDefault();
  if (!validateForm()) {
    showToast('Preencha os campos obrigatórios.', 'error');
    return;
  }

  const data = {
    titulo:      document.getElementById('form-titulo').value.trim(),
    tipo:        document.getElementById('form-tipo').value,
    finalidade:  document.getElementById('form-finalidade').value,
    preco:       parseFloat(document.getElementById('form-preco').value) || 0,
    status:      document.getElementById('form-status').value,
    quartos:     parseInt(document.getElementById('form-quartos').value) || 0,
    banheiros:   parseInt(document.getElementById('form-banheiros').value) || 0,
    vagas:       parseInt(document.getElementById('form-vagas').value) || 0,
    area:        parseFloat(document.getElementById('form-area').value) || 0,
    bairro:      document.getElementById('form-bairro').value.trim(),
    cidade:      document.getElementById('form-cidade').value.trim(),
    estado:      document.getElementById('form-estado').value,
    descricao:   document.getElementById('form-descricao').value.trim(),
    codigo:      document.getElementById('form-codigo').value.trim(),
    contato:     document.getElementById('form-contato').value.trim(),
    imagem:      document.getElementById('form-imagem').value.trim()
  };

  const editId = state.editingId;

  if (editId) {
    const idx = state.imoveis.findIndex(i => i.id === editId);
    if (idx !== -1) {
      state.imoveis[idx] = { ...state.imoveis[idx], ...data };
      showToast('Imóvel atualizado com sucesso! ✅', 'success');
    }
  } else {
    state.imoveis.unshift({
      id: nextId(),
      ...data,
      dataCadastro: new Date().toISOString()
    });
    showToast('Imóvel cadastrado com sucesso! 🏠', 'success');
  }

  saveData();
  closeFormModal();
  render();
}

function deleteImovel() {
  const id = state.deletingId;
  if (!id) return;
  state.imoveis = state.imoveis.filter(i => i.id !== id);
  saveData();
  closeConfirmModal();
  closeDetModal();
  render();
  showToast('Imóvel excluído.', 'info');
}

/* ==============================
   TOAST
   ============================== */
function showToast(msg, type = 'success') {
  const container = document.getElementById('toast-container');
  const toast = document.createElement('div');
  toast.classList.add('toast', `toast-${type}`);
  toast.textContent = msg;
  container.appendChild(toast);

  setTimeout(() => {
    toast.classList.add('hide');
    toast.addEventListener('animationend', () => toast.remove());
  }, 3500);
}

/* ==============================
   EVENTS
   ============================== */
function bindEvents() {
  // Search
  document.getElementById('search-input').addEventListener('input', e => {
    state.filtros.busca = e.target.value;
    render();
  });
  document.getElementById('search-btn').addEventListener('click', () => render());

  // Novo imóvel
  document.getElementById('btn-novo').addEventListener('click', () => openFormModal());

  // Form submit
  document.getElementById('imovel-form').addEventListener('submit', saveImovel);

  // Form close/cancel
  document.getElementById('modal-form-close').addEventListener('click', closeFormModal);
  document.getElementById('btn-cancel-form').addEventListener('click', closeFormModal);

  // Detalhes close
  document.getElementById('modal-det-close').addEventListener('click', closeDetModal);

  // Detalhes actions
  document.getElementById('btn-edit-det').addEventListener('click', () => {
    const id = state.editingId;
    closeDetModal();
    openFormModal(id);
  });

  document.getElementById('btn-delete-det').addEventListener('click', () => {
    const id = state.editingId;
    closeDetModal();
    openConfirmModal(id);
  });

  // Confirm
  document.getElementById('modal-confirm-close').addEventListener('click', closeConfirmModal);
  document.getElementById('btn-confirm-cancel').addEventListener('click', closeConfirmModal);
  document.getElementById('btn-confirm-ok').addEventListener('click', deleteImovel);

  // Click on overlay to close
  ['modal-form', 'modal-detalhes', 'modal-confirm'].forEach(modalId => {
    document.getElementById(modalId).addEventListener('click', e => {
      if (e.target.id === modalId) {
        if (modalId === 'modal-form') closeFormModal();
        else if (modalId === 'modal-detalhes') closeDetModal();
        else closeConfirmModal();
      }
    });
  });

  // ESC key
  document.addEventListener('keydown', e => {
    if (e.key !== 'Escape') return;
    if (!document.getElementById('modal-form').hidden) closeFormModal();
    else if (!document.getElementById('modal-detalhes').hidden) closeDetModal();
    else if (!document.getElementById('modal-confirm').hidden) closeConfirmModal();
  });

  // Card actions (event delegation)
  document.getElementById('imoveis-grid').addEventListener('click', e => {
    const btn = e.target.closest('[data-action]');
    if (!btn) {
      // click on card body = open details
      const card = e.target.closest('.prop-card');
      if (card && !e.target.closest('.card-footer')) {
        const id = parseInt(card.dataset.id);
        openDetModal(id);
      }
      return;
    }
    const id = parseInt(btn.dataset.id);
    const action = btn.dataset.action;
    if (action === 'view')   openDetModal(id);
    if (action === 'edit')   openFormModal(id);
    if (action === 'delete') openConfirmModal(id);
  });

  // View toggle
  document.getElementById('btn-grid').addEventListener('click', () => {
    state.viewMode = 'grid';
    document.getElementById('imoveis-grid').classList.remove('list-view');
    document.getElementById('btn-grid').classList.add('active');
    document.getElementById('btn-list').classList.remove('active');
    document.getElementById('btn-grid').setAttribute('aria-pressed', 'true');
    document.getElementById('btn-list').setAttribute('aria-pressed', 'false');
  });

  document.getElementById('btn-list').addEventListener('click', () => {
    state.viewMode = 'list';
    document.getElementById('imoveis-grid').classList.add('list-view');
    document.getElementById('btn-list').classList.add('active');
    document.getElementById('btn-grid').classList.remove('active');
    document.getElementById('btn-list').setAttribute('aria-pressed', 'true');
    document.getElementById('btn-grid').setAttribute('aria-pressed', 'false');
  });

  // Filters: finalidade
  document.querySelectorAll('input[name="finalidade"]').forEach(radio => {
    radio.addEventListener('change', e => {
      state.filtros.finalidade = e.target.value;
      render();
    });
  });

  // Filters: tipo
  document.querySelectorAll('input[name="tipo"]').forEach(cb => {
    cb.addEventListener('change', () => {
      state.filtros.tipos = [...document.querySelectorAll('input[name="tipo"]:checked')]
        .map(c => c.value);
      render();
    });
  });

  // Filters: status
  document.querySelectorAll('input[name="status"]').forEach(cb => {
    cb.addEventListener('change', () => {
      state.filtros.status = [...document.querySelectorAll('input[name="status"]:checked')]
        .map(c => c.value);
      render();
    });
  });

  // Sort
  document.getElementById('sort-select').addEventListener('change', e => {
    state.filtros.ordem = e.target.value;
    render();
  });

  // Clear filters
  document.getElementById('btn-clear-filters').addEventListener('click', () => {
    state.filtros = { busca: '', finalidade: '', tipos: [], status: [], ordem: 'data-desc' };
    document.getElementById('search-input').value = '';
    document.querySelectorAll('input[name="finalidade"]')[0].checked = true;
    document.querySelectorAll('input[name="tipo"]').forEach(c => c.checked = false);
    document.querySelectorAll('input[name="status"]').forEach(c => c.checked = false);
    document.getElementById('sort-select').value = 'data-desc';
    render();
    showToast('Filtros limpos.', 'info');
  });
}

/* ==============================
   INIT
   ============================== */
document.addEventListener('DOMContentLoaded', () => {
  loadData();
  bindEvents();
  render();
  updateStats();
});

