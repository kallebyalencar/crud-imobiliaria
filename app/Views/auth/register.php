<?php $base = '/tde-backend/crud-imobiliaria/public'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Crie sua conta no Bosque das Chaves e encontre o imóvel dos seus sonhos.">
  <title>Cadastro de Usuário - Bosque das Chaves</title>
  <link rel="stylesheet" href="<?= $base ?>/assets/css/reset.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/register.css">
</head>
<body>

  <?php require_once '../app/Views/partials/header.php'; ?>

  <main id="main-content">
    <section class="register-section" aria-labelledby="register-heading">
      <div class="register-wrapper">
        <aside class="register-aside" aria-hidden="true">
          <div class="aside-content">
            <h2>Bem-vindo ao<br>Bosque das Chaves</h2>
            <p>Crie sua conta e tenha acesso a centenas de imóveis exclusivos no melhor condomínio da região.</p>
            <ul class="aside-benefits">
              <li>🏡 Acesso a imóveis exclusivos</li>
              <li>🔔 Alertas de novos imóveis</li>
              <li>❤️ Salve seus favoritos</li>
              <li>📞 Contato direto com corretores</li>
            </ul>
          </div>
        </aside>
        <div class="register-card">
          <div class="register-card-header">
            <h2 id="register-heading" class="section-title">Criar Conta</h2>
            <p>Preencha os campos abaixo para se cadastrar</p>
          </div>
          <form id="register-form" class="register-form" method="POST" action="<?= $base ?>/cadastro" novalidate>
            <div class="form-row">
              <div class="form-group">
                <label for="reg-nome">Nome <span class="required">*</span></label>
                <input type="text" id="reg-nome" name="nome" placeholder="Seu nome" required>
                <span class="field-error" id="reg-nome-error"></span>
              </div>
              <div class="form-group">
                <label for="reg-sobrenome">Sobrenome <span class="required">*</span></label>
                <input type="text" id="reg-sobrenome" name="sobrenome" placeholder="Seu sobrenome" required>
                <span class="field-error" id="reg-sobrenome-error"></span>
              </div>
            </div>
            <div class="form-group full-width">
              <label for="reg-email">E-mail <span class="required">*</span></label>
              <input type="email" id="reg-email" name="email" placeholder="seu@email.com.br" required>
              <span class="field-error" id="reg-email-error"></span>
            </div>
            <div class="form-group full-width">
              <label for="reg-telefone">Telefone / WhatsApp</label>
              <input type="tel" id="reg-telefone" name="telefone" placeholder="(00) 00000-0000" maxlength="15">
              <span class="field-hint">Formato: (DDD) 00000-0000</span>
            </div>
            <div class="form-group full-width">
              <label for="reg-cpf">CPF <span class="required">*</span></label>
              <input type="text" id="reg-cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" required>
              <span class="field-error" id="reg-cpf-error"></span>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="reg-senha">Senha <span class="required">*</span></label>
                <div class="input-password-wrapper">
                  <input type="password" id="reg-senha" name="senha" placeholder="Mínimo 8 caracteres" required>
                  <button type="button" class="btn-toggle-password" id="toggle-senha" aria-label="Mostrar senha">
                    <svg id="icon-eye-senha" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                    </svg>
                  </button>
                </div>
                <div class="password-strength" id="password-strength">
                  <div class="strength-bar">
                    <span class="bar-segment" id="bar-1"></span>
                    <span class="bar-segment" id="bar-2"></span>
                    <span class="bar-segment" id="bar-3"></span>
                    <span class="bar-segment" id="bar-4"></span>
                  </div>
                  <span class="strength-label" id="strength-label"></span>
                </div>
                <span class="field-hint">Use letras, números e símbolos</span>
                <span class="field-error" id="reg-senha-error"></span>
              </div>
              <div class="form-group">
                <label for="reg-confirmar-senha">Confirmar Senha <span class="required">*</span></label>
                <div class="input-password-wrapper">
                  <input type="password" id="reg-confirmar-senha" name="confirmar_senha" placeholder="Repita a senha" required>
                  <button type="button" class="btn-toggle-password" id="toggle-confirmar" aria-label="Mostrar confirmação">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                    </svg>
                  </button>
                </div>
                <span class="field-error" id="reg-confirmar-senha-error"></span>
              </div>
            </div>
            <div class="form-group full-width">
              <label class="checkbox-label" for="reg-termos">
                <input type="checkbox" id="reg-termos" name="termos" required>
                <span>Concordo com os <a href="#" class="link-termos">Termos de Uso</a> e a <a href="#" class="link-termos">Política de Privacidade</a></span>
              </label>
              <span class="field-error" id="reg-termos-error"></span>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn-register" id="btn-register">
                <span id="btn-register-text">Criar minha conta</span>
                <span class="btn-spinner" id="btn-spinner" hidden></span>
              </button>
            </div>
          </form>
          <p class="login-redirect">
            Já tem uma conta? <a href="<?= $base ?>/login">Faça login</a>
          </p>
        </div>
      </div>
    </section>
  </main>

  <div class="toast-container" id="toast-container"></div>

  <footer class="main-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-column footer-logo">
          <img src="<?= $base ?>/assets/img/logo.jpeg" alt="Logo Bosque das Chaves">
          <p>Encontre a entrada para seu lar mágico.</p>
        </div>
        <div class="footer-column">
          <h4>Links Rápidos</h4>
          <a href="<?= $base ?>/">Início</a>
          <a href="<?= $base ?>/sobre">Sobre nós</a>
          <a href="<?= $base ?>/imoveis">Todos os Imóveis</a>
        </div>
        <div class="footer-column">
          <h4>Contato</h4>
          <p>contato@bosquesdas chaves.com.br</p>
          <p>(00) 00000-0000</p>
        </div>
      </div>
      <div class="footer-bottom">
        <hr>
        <p>© 2025 Bosque das Chaves. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>

  <script src="<?= $base ?>/assets/js/register.js"></script>
</body>
</html>