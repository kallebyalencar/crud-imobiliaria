<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Verde Imobiliaria</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
    <header class="navbar">
        <div class="container">
            <div class="logo">
                <a href="home-page.html">
                    <img src="assets/img/logo.jpeg" alt="logo">
                    <h1>Verde Imobiliaria</h1>
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
    <main class="main-content">
        <section class="hero-banner">
            <div class="hero-slider">
                <div class="slide">
                    <img src="assets/img/hero-banner-maior.jpeg" alt="hero-banner">
                </div>
                
                <div class="hero-content">
                    <h2>Alugue seu imóvel dos sonhos <br> com a Verde Imobiliaria</h2>
                    <a href="about.html"><button class="more-info" type="button">Saiba Mais</button></a>
                </div>
            </div>
        </section>

        <section class="client-options">
            <div class="container">
                <div class="options-grid" id="client-options-grid">
                    <div class="option-item">
                        <img src="assets/img/key-grid.jpg" alt="Opção 1">
                        <h3>Anuncie seu imóvel com a gente</h3>
                    </div>
                    <div class="option-item">
                        <img src="assets/img/conor-grid.jpg" alt="Opção 2">
                        <h3>Procurando um lar no cariri?</h3>
                    </div>
                    <div class="option-item">
                        <img src="assets/img/purchase-grid.jpg" alt="Opção 3">
                        <h3>Quero comprar</h3>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured-properties">
            <div class="container">
                <h2 class="section-title">Imóveis em Destaque</h2>
                <div class="properties-grid" id="featured-properties-grid">
                </div>
            </div>
        </section>
        <section class="benefits">
            <div class="benefits-list">
                <div class="benefits-image">
                    <img src="assets/img/white-logo.png" alt="white-logo">
                </div>
                <div class="benefit-item">
                    <h3>Ambiente Personalizado</h3>
                    <p>O espaço já vem com gostinho de Lar, pronto para abrigar os sonhos de toda a Familia</p>
                </div>
        </section>
    </main>
    <footer class="main-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h4>Fale Conosco</h4>
                    <div class="e-mail">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                        <a href="mailto:giselle.alves@aluno.unifapce.edu.br">giselle.alves@aluno.unifapce.edu.br</a>
                    </div>
                    <div class="phone">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                        </svg>
                        <a href="Https://wa.me/5588994429502">(88)99442-9502</a>
                    </div>
                </div>
                <div class="footer-column">
                        <h4>Formas de Pagamento</h4>
                        <div class="payment-methods">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
                                <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                            </svg>

                        </div>
                    </div>
                <div class="footer-logo">
                    <img src="assets/img/brazil-map.png" alt="white-logo">
                </div>

            </div>
        </div>
        <div class="container-bottom">
            <div class="footer-bottom">
             <hr>
             <p>&copy; 2024 Verde Imobiliaria. Todos os direitos reservados.</p>
             <p>Os produtos anunciados nesse site são fictícios e fazem parte de um projeto para estudos</p>
            </div>
        </div>
    </footer>
    
    <script>
  document.addEventListener("DOMContentLoaded", () => {
    fetch("assets/data/imoveis.json")
      .then(response => response.json())
      .then(data => {
        const grid = document.getElementById("featured-properties-grid");

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
</html>
