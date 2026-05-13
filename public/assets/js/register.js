/**
 * register.js — Bosque das Chaves
 * Lógica da tela de cadastro de usuário:
 *  - Máscara de CPF e Telefone
 *  - Indicador de força da senha
 *  - Toggle de visibilidade da senha
 *  - Validação em tempo real e no submit
 *  - Feedback de toast
 */

'use strict';

const form              = document.getElementById('register-form');
const btnRegister       = document.getElementById('btn-register');
const btnRegisterText   = document.getElementById('btn-register-text');
const btnSpinner        = document.getElementById('btn-spinner');
const fieldNome         = document.getElementById('reg-nome');
const fieldSobrenome    = document.getElementById('reg-sobrenome');
const fieldEmail        = document.getElementById('reg-email');
const fieldTelefone     = document.getElementById('reg-telefone');
const fieldCpf          = document.getElementById('reg-cpf');
const fieldSenha        = document.getElementById('reg-senha');
const fieldConfirmar    = document.getElementById('reg-confirmar-senha');
const fieldTermos       = document.getElementById('reg-termos');
const toggleSenha       = document.getElementById('toggle-senha');
const toggleConfirmar   = document.getElementById('toggle-confirmar');
const bars              = [
  document.getElementById('bar-1'),
  document.getElementById('bar-2'),
  document.getElementById('bar-3'),
  document.getElementById('bar-4'),
];
const strengthLabel     = document.getElementById('strength-label');
const toastContainer    = document.getElementById('toast-container');

function showError(errorId, msg, input = null) {
  const el = document.getElementById(errorId);
  if (el) el.textContent = msg;
  if (input) {
    input.classList.add('input-error');
    input.classList.remove('input-success');
  }
}

function clearError(errorId, input = null) {
  const el = document.getElementById(errorId);
  if (el) el.textContent = '';
  if (input) input.classList.remove('input-error');
}

function markSuccess(errorId, input = null) {
  clearError(errorId, input);
  if (input) input.classList.add('input-success');
}

function maskCpf(value) {
  return value.replace(/\D/g, '').slice(0, 11)
    .replace(/(\d{3})(\d)/, '$1.$2')
    .replace(/(\d{3})(\d)/, '$1.$2')
    .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
}

function maskPhone(value) {
  const digits = value.replace(/\D/g, '').slice(0, 11);
  if (digits.length <= 10) {
    return digits.replace(/(\d{2})(\d)/, '($1) $2').replace(/(\d{4})(\d)/, '$1-$2');
  }
  return digits.replace(/(\d{2})(\d)/, '($1) $2').replace(/(\d{5})(\d)/, '$1-$2');
}

fieldCpf.addEventListener('input', (e) => { e.target.value = maskCpf(e.target.value); });
fieldTelefone.addEventListener('input', (e) => { e.target.value = maskPhone(e.target.value); });

const strengthConfig = [
  { label: 'Muito fraca', classKey: 'weak',   segments: 1 },
  { label: 'Fraca',       classKey: 'weak',   segments: 1 },
  { label: 'Razoável',    classKey: 'medium', segments: 2 },
  { label: 'Boa',         classKey: 'strong', segments: 3 },
  { label: 'Muito forte', classKey: 'great',  segments: 4 },
];

function calcStrength(password) {
  let score = 0;
  if (password.length >= 8)  score++;
  if (password.length >= 12) score++;
  if (/[A-Z]/.test(password)) score++;
  if (/[0-9]/.test(password)) score++;
  if (/[^A-Za-z0-9]/.test(password)) score++;
  return Math.min(score, 4);
}

function updateStrengthBar(password) {
  const score = password.length === 0 ? -1 : calcStrength(password);
  bars.forEach(b => { b.className = 'bar-segment'; });
  strengthLabel.textContent = '';
  if (score < 0) return;
  const cfg = strengthConfig[score];
  for (let i = 0; i < cfg.segments; i++) bars[i].classList.add(cfg.classKey);
  strengthLabel.textContent = cfg.label;
}

fieldSenha.addEventListener('input', () => {
  updateStrengthBar(fieldSenha.value);
  if (fieldSenha.value.length > 0) clearError('reg-senha-error', fieldSenha);
  if (fieldConfirmar.value.length > 0) validateConfirmar();
});

function setupToggle(button, input) {
  button.addEventListener('click', () => {
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    button.setAttribute('aria-pressed', String(isPassword));
    button.style.opacity = isPassword ? '1' : '0.5';
  });
}

setupToggle(toggleSenha, fieldSenha);
setupToggle(toggleConfirmar, fieldConfirmar);

function validateNome() {
  const val = fieldNome.value.trim();
  if (!val) { showError('reg-nome-error', 'Informe seu nome.', fieldNome); return false; }
  if (val.length < 2) { showError('reg-nome-error', 'Nome muito curto.', fieldNome); return false; }
  markSuccess('reg-nome-error', fieldNome);
  return true;
}

function validateSobrenome() {
  const val = fieldSobrenome.value.trim();
  if (!val) { showError('reg-sobrenome-error', 'Informe seu sobrenome.', fieldSobrenome); return false; }
  if (val.length < 2) { showError('reg-sobrenome-error', 'Sobrenome muito curto.', fieldSobrenome); return false; }
  markSuccess('reg-sobrenome-error', fieldSobrenome);
  return true;
}

function validateEmail() {
  const val = fieldEmail.value.trim();
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!val) { showError('reg-email-error', 'Informe seu e-mail.', fieldEmail); return false; }
  if (!emailRegex.test(val)) { showError('reg-email-error', 'E-mail inválido.', fieldEmail); return false; }
  markSuccess('reg-email-error', fieldEmail);
  return true;
}

function validateCpf() {
  const raw = fieldCpf.value.replace(/\D/g, '');
  if (!raw) { showError('reg-cpf-error', 'Informe seu CPF.', fieldCpf); return false; }
  if (raw.length !== 11) { showError('reg-cpf-error', 'CPF deve ter 11 dígitos.', fieldCpf); return false; }
  if (!isValidCpf(raw)) { showError('reg-cpf-error', 'CPF inválido.', fieldCpf); return false; }
  markSuccess('reg-cpf-error', fieldCpf);
  return true;
}

function validateSenha() {
  const val = fieldSenha.value;
  if (!val) { showError('reg-senha-error', 'Crie uma senha.', fieldSenha); return false; }
  if (val.length < 8) { showError('reg-senha-error', 'Mínimo 8 caracteres.', fieldSenha); return false; }
  markSuccess('reg-senha-error', fieldSenha);
  return true;
}

function validateConfirmar() {
  const val = fieldConfirmar.value;
  if (!val) { showError('reg-confirmar-senha-error', 'Confirme sua senha.', fieldConfirmar); return false; }
  if (val !== fieldSenha.value) { showError('reg-confirmar-senha-error', 'As senhas não coincidem.', fieldConfirmar); return false; }
  markSuccess('reg-confirmar-senha-error', fieldConfirmar);
  return true;
}

function validateTermos() {
  if (!fieldTermos.checked) { showError('reg-termos-error', 'Você deve aceitar os termos.'); return false; }
  clearError('reg-termos-error');
  return true;
}

function isValidCpf(cpf) {
  if (/^(\d)\1{10}$/.test(cpf)) return false;
  let sum = 0;
  for (let i = 0; i < 9; i++) sum += parseInt(cpf[i]) * (10 - i);
  let check1 = (sum * 10) % 11;
  if (check1 === 10 || check1 === 11) check1 = 0;
  if (check1 !== parseInt(cpf[9])) return false;
  sum = 0;
  for (let i = 0; i < 10; i++) sum += parseInt(cpf[i]) * (11 - i);
  let check2 = (sum * 10) % 11;
  if (check2 === 10 || check2 === 11) check2 = 0;
  return check2 === parseInt(cpf[10]);
}

function showToast(msg, type = 'success', duration = 4000) {
  const icons = { success: '✅', error: '❌', info: 'ℹ️' };
  const toast = document.createElement('div');
  toast.className = `toast toast-${type}`;
  toast.innerHTML = `
    <span class="toast-icon">${icons[type] || 'ℹ️'}</span>
    <span class="toast-msg">${msg}</span>
    <button class="toast-close" aria-label="Fechar">&times;</button>
  `;
  toastContainer.appendChild(toast);
  const closeBtn = toast.querySelector('.toast-close');
  const dismiss = () => {
    toast.classList.add('fade-out');
    toast.addEventListener('animationend', () => toast.remove(), { once: true });
  };
  closeBtn.addEventListener('click', dismiss);
  setTimeout(dismiss, duration);
}

fieldNome.addEventListener('blur', validateNome);
fieldSobrenome.addEventListener('blur', validateSobrenome);
fieldEmail.addEventListener('blur', validateEmail);
fieldCpf.addEventListener('blur', validateCpf);
fieldSenha.addEventListener('blur', validateSenha);
fieldConfirmar.addEventListener('blur', validateConfirmar);
fieldTermos.addEventListener('change', validateTermos);

form.addEventListener('submit', (e) => {
  const valid =
    validateNome() &
    validateSobrenome() &
    validateEmail() &
    validateCpf() &
    validateSenha() &
    validateConfirmar() &
    validateTermos();

  if (!valid) {
    e.preventDefault();
    showToast('Por favor, corrija os erros no formulário.', 'error');
    const firstError = form.querySelector('.input-error');
    if (firstError) {
      firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
      firstError.focus();
    }
  }
});