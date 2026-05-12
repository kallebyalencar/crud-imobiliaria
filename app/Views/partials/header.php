<?php $base = '/tde-backend/crud-imobiliaria/public'; ?>
<header class="navbar">
    <div class="container">
        <div class="logo">
            <a href="<?= $base ?>/">
                <img src="<?= $base ?>/assets/img/logo.jpeg" alt="logo">
                <h1>Bosque das Chaves</h1>
            </a>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Encontre a entrada para seu lar mágico">
            <button type="submit">Buscar</button>
        </div>
        <div class="perfil">
            <a href="<?= $base ?>/login" class="account-link">
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
                <li><a href="<?= $base ?>/">Início</a></li>
                <li><a href="<?= $base ?>/sobre">Sobre nós</a></li>
                <li><a href="<?= $base ?>/imoveis">Todos os Imóveis</a></li>
            </ul>
        </div>
        <div class="auth-buttons">
            <button class="cadastro" type="button" onclick="window.location.href='<?= $base ?>/cadastro'">Cadastre-se</button>
            <button class="login" type="button" onclick="window.location.href='<?= $base ?>/login'">Login</button>
        </div>
    </nav>
</header>