<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Verde Imobiliária</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/properties.css">


</head>

<body>
    <header class="navbar">
        <div class="container">
            <div class="logo">
                <a href="home-page.html">
                    <img src="assets/img/logo.jpeg" alt="logo">
                    <h1>Verde Imobiliária</h1>
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
    <section class="all-properties">
        <div class="container">
            <h2 class="section-title">Todos os Imóveis</h2>
            <div class="properties-grid" id="all-properties-grid">
                <?php if (empty($imoveis)): ?>
                    <p>Nenhum imóvel cadastrado ainda.</p>
                <?php else: ?>
                    <?php foreach ($imoveis as $imovel): ?>
                        <div class="property-card" onclick="window.location.href='<?= BASE_URL ?>/imovel?id=<?= $imovel->id ?>'">
                            <img src="<?= BASE_URL ?>/assets/img/<?= htmlspecialchars($imovel->imagem) ?>" alt="<?= htmlspecialchars($imovel->titulo) ?>">
                            <div class="property-info">
                                <h3><?= htmlspecialchars($imovel->titulo) ?></h3>
                                <p><?= htmlspecialchars($imovel->descricao) ?></p>
                                <span class="location"><?= htmlspecialchars($imovel->cidade) ?></span>
                                <span class="price">R$ <?= number_format($imovel->preco, 2, ',', '.') ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetch("assets/data/imoveis.json")
                .then(response => response.json())
                .then(data => {
                    const grid = document.getElementById("all-properties-grid");

                    data.forEach(imovel => {
                        const card = document.createElement("div");
                        card.classList.add("property-card");
                        card.addEventListener("click", () => {
                            window.location.href = `property.html?id=${imovel.id}`;
                        });

                        card.innerHTML = `
            <img src="${imovel.image}" alt="${imovel.title}">
            <div class="property-info">
              <h3>${imovel.title}</h3>
              <p>${imovel.description}</p>
              <span class="location">${imovel.location}</span>
              <span class="price">R$ ${imovel.price.toLocaleString("pt-BR")}</span>
            </div>
          `;

                        grid.appendChild(card);
                    });
                })
                .catch(error => console.error("Erro ao carregar imóveis:", error));
        });
    </script>
</body>