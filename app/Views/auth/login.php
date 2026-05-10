<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
        <header class="navbar">
        <div class="container">
            <div class="logo">
                <a href="home-page.html">
                    <img src="assets/img/logo.jpeg" alt="logo">
                    <h1>Bosque das Chaves</h1>
                </a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Encontre a entrada para seu lar mágico">
                <button type="submit">Buscar</button>
            </div>
            <div class="perfil">
                <a href="login.html" class="account-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                 </svg>
                    <span>Meu perfil</span>
                </a>
            </div>
        </div>
        <nav class="main-menu">
            <div class="container">
                <ul class="menu-list">
                    <li><a href="home-page.html">Início</a></li>
                    <li><a href="about.html">Sobre nós</a></li>
                    <li><a href="properties.html">Todos os Imóveis</a></li>
                </ul>
            </div>

            <div class="auth-buttons">
                <button class="cadastro" type="button">Cadastre-se</button>
                <button class="login" type="submit">Login</button>
            </div>
        </nav>
    </header>
  <section class="login">
    <div class="login-container">
    <h2>Login</h2>
    <form>
        <label for="E-mail">E-mail</label>
      <input type="text" placeholder="E-mail" required>
        <label for="Password">Senha</label>
      <input type="password" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="#">Cadastre-se</a></p>
  </div>
  </section>
</body>
</html>