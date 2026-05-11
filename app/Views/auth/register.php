<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Crie sua conta no Bosque das Chaves e encontre o imóvel dos seus sonhos.">
  <title>Cadastro de Usuário - Bosque das Chaves</title>
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>

  <!-- ===== HEADER ===== -->
  <header class="navbar" role="banner">
    <div class="container">
      <div class="logo">
        <a href="/" aria-label="Bosque das Chaves - Início">
          <img src="assets/img/logo.jpeg" alt="Logo Bosque das Chaves">
          <h1>Bosque das Chaves</h1>
        </a>
      </div>
      <div class="search-bar" role="search">
        <input type="text" placeholder="Encontre a entrada para seu lar mágico" aria-label="Buscar imóveis">
        <button type="button">Buscar</button>
      </div>
      <div class="perfil">
        <a href="login" class="account-link" aria-label="Meu perfil">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
          </svg>
          <span>Meu perfil</span>
        </a>
      </div>
    </div>

    <nav class="main-menu" aria-label="Menu principal">
      <div class="container">
        <ul class="menu-list" role="list">
          <li><a href="/">Início</a></li>
          <li><a href="sobre">Sobre nós</a></li>
          <li><a href="imoveis">Todos os Imóveis</a></li>
        </ul>
      </div>
      <div class="auth-buttons">
        <button class="cadastro" type="button" onclick="window.location.href='cadastro'" aria-current="page">Cadastre-se</button>
        <button class="login" type="button" onclick="window.location.href='login'">Login</button>
      </div>
    </nav>
  </header>

  <!-- ===== MAIN ===== -->
  <main id="main-content">
    <section class="register-section" aria-labelledby="register-heading">
      <div class="register-wrapper">

        <!-- Painel lateral decorativo -->
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

        <!-- Formulário de cadastro -->
        <div class="register-card">
          <div class="register-card-header">
            <h2 id="register-heading" class="section-title">Criar Conta</h2>
            <p>Preencha os campos abaixo para se cadastrar</p>
          </div>

          <form id="register-form" class="register-form" novalidate aria-label="Formulário de cadastro de usuário">

            <!-- Nome Completo -->
            <div class="form-row">
              <div class="form-group">
                <label for="reg-nome">Nome <span class="required" aria-label="obrigatório">*</span></label>
                <input
                  type="text"
                  id="reg-nome"
                  name="nome"
                  placeholder="Seu nome"
                  autocomplete="given-name"
                  required
                  aria-required="true"
                  aria-describedby="reg-nome-error"
                >
                <span class="field-error" id="reg-nome-error" role="alert" aria-live="polite"></span>
              </div>

              <div class="form-group">
                <label for="reg-sobrenome">Sobrenome <span class="required" aria-label="obrigatório">*</span></label>
                <input
                  type="text"
                  id="reg-sobrenome"
                  name="sobrenome"
                  placeholder="Seu sobrenome"
                  autocomplete="family-name"
                  required
                  aria-required="true"
                  aria-describedby="reg-sobrenome-error"
                >
                <span class="field-error" id="reg-sobrenome-error" role="alert" aria-live="polite"></span>
              </div>
            </div>

            <!-- E-mail -->
            <div class="form-group full-width">
              <label for="reg-email">E-mail <span class="required" aria-label="obrigatório">*</span></label>
              <input
                type="email"
                id="reg-email"
                name="email"
                placeholder="seu@email.com.br"
                autocomplete="email"
                required
                aria-required="true"
                aria-describedby="reg-email-error"
              >
              <span class="field-error" id="reg-email-error" role="alert" aria-live="polite"></span>
            </div>

            <!-- Telefone -->
            <div class="form-group full-width">
              <label for="reg-telefone">Telefone / WhatsApp</label>
              <input
                type="tel"
                id="reg-telefone"
                name="telefone"
                placeholder="(00) 00000-0000"
                autocomplete="tel"
                maxlength="15"
                aria-describedby="reg-telefone-hint"
              >
              <span class="field-hint" id="reg-telefone-hint">Formato: (DDD) 00000-0000</span>
            </div>

            <!-- CPF -->
            <div class="form-group full-width">
              <label for="reg-cpf">CPF <span class="required" aria-label="obrigatório">*</span></label>
              <input
                type="text"
                id="reg-cpf"
                name="cpf"
                placeholder="000.000.000-00"
                maxlength="14"
                required
                aria-required="true"
                aria-describedby="reg-cpf-error"
              >
              <span class="field-error" id="reg-cpf-error" role="alert" aria-live="polite"></span>
            </div>

            <!-- Senha -->
            <div class="form-row">
              <div class="form-group">
                <label for="reg-senha">Senha <span class="required" aria-label="obrigatório">*</span></label>
                <div class="input-password-wrapper">
                  <input
                    type="password"
                    id="reg-senha"
                    name="senha"
                    placeholder="Mínimo 8 caracteres"
                    autocomplete="new-password"
                    required
                    aria-required="true"
                    aria-describedby="reg-senha-error reg-senha-hint"
                  >
                  <button type="button" class="btn-toggle-password" id="toggle-senha" aria-label="Mostrar senha" aria-pressed="false">
                    <svg id="icon-eye-senha" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                      <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                    </svg>
                  </button>
                </div>
                <div class="password-strength" id="password-strength" aria-live="polite">
                  <div class="strength-bar">
                    <span class="bar-segment" id="bar-1"></span>
                    <span class="bar-segment" id="bar-2"></span>
                    <span class="bar-segment" id="bar-3"></span>
                    <span class="bar-segment" id="bar-4"></span>
                  </div>
                  <span class="strength-label" id="strength-label"></span>
                </div>
                <span class="field-hint" id="reg-senha-hint">Use letras, números e símbolos</span>
                <span class="field-error" id="reg-senha-error" role="alert" aria-live="polite"></span>
              </div>

              <div class="form-group">
                <label for="reg-confirmar-senha">Confirmar Senha <span class="required" aria-label="obrigatório">*</span></label>
                <div class="input-password-wrapper">
                  <input
                    type="password"
                    id="reg-confirmar-senha"
                    name="confirmar_senha"
                    placeholder="Repita a senha"
                    autocomplete="new-password"
                    required
                    aria-required="true"
                    aria-describedby="reg-confirmar-senha-error"
                  >
                  <button type="button" class="btn-toggle-password" id="toggle-confirmar" aria-label="Mostrar confirmação de senha" aria-pressed="false">
                    <svg id="icon-eye-confirmar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                      <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                    </svg>
                  </button>
                </div>
                <span class="field-error" id="reg-confirmar-senha-error" role="alert" aria-live="polite"></span>
              </div>
            </div>

            <!-- Tipo de Perfil -->
            <fieldset class="form-group full-width">
              <legend>Tipo de Perfil <span class="required" aria-label="obrigatório">*</span></legend>
              <div class="radio-group" role="radiogroup" aria-required="true">
                <label class="radio-card" id="label-comprador">
                  <input type="radio" name="perfil" id="reg-comprador" value="comprador" checked>
                  <span class="radio-card-icon">🏠</span>
                  <span class="radio-card-label">Comprador / Locatário</span>
                </label>
                <label class="radio-card" id="label-proprietario">
                  <input type="radio" name="perfil" id="reg-proprietario" value="proprietario">
                  <span class="radio-card-icon">🔑</span>
                  <span class="radio-card-label">Proprietário</span>
                </label>
                <label class="radio-card" id="label-corretor">
                  <input type="radio" name="perfil" id="reg-corretor" value="corretor">
                  <span class="radio-card-icon">👔</span>
                  <span class="radio-card-label">Corretor</span>
                </label>
              </div>
            </fieldset>

            <!-- Termos e Condições -->
            <div class="form-group full-width">
              <label class="checkbox-label" for="reg-termos">
                <input
                  type="checkbox"
                  id="reg-termos"
                  name="termos"
                  required
                  aria-required="true"
                  aria-describedby="reg-termos-error"
                >
                <span>Concordo com os <a href="#" class="link-termos">Termos de Uso</a> e a <a href="#" class="link-termos">Política de Privacidade</a></span>
              </label>
              <span class="field-error" id="reg-termos-error" role="alert" aria-live="polite"></span>
            </div>

            <!-- Botão de envio -->
            <div class="form-actions">
              <button type="submit" class="btn-register" id="btn-register">
                <span id="btn-register-text">Criar minha conta</span>
                <span class="btn-spinner" id="btn-spinner" hidden aria-hidden="true"></span>
              </button>
            </div>

          </form>

          <p class="login-redirect">
            Já tem uma conta? <a href="login">Faça login</a>
          </p>
        </div><!-- /.register-card -->

      </div><!-- /.register-wrapper -->
    </section>
  </main>

  <!-- ===== TOAST ===== -->
  <div class="toast-container" id="toast-container" aria-live="assertive" aria-atomic="true"></div>

  <!-- ===== FOOTER ===== -->
  <footer class="main-footer" role="contentinfo">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-column footer-logo">
          <img src="assets/img/logo.jpeg" alt="Logo Bosque das Chaves">
          <p>Encontre a entrada para seu lar mágico.</p>
        </div>
        <div class="footer-column">
          <h4>Links Rápidos</h4>
          <a href="/">Início</a>
          <a href="sobre">Sobre nós</a>
          <a href="imoveis">Todos os Imóveis</a>
        </div>
        <div class="footer-column">
          <h4>Contato</h4>
          <p>contato@bosquedas chaves.com.br</p>
          <p>(00) 00000-0000</p>
        </div>
      </div>
      <div class="footer-bottom">
        <hr>
        <p>© 2025 Bosque das Chaves. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>

  <script src="assets/js/register.js"></script>
</body>
</html>
