<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Vendedor</title>
    <link rel="stylesheet" href="perfil.css">
</head>

<body>

<header class="navbar">

    <div class="top-header">
        <div class="logo">
            <img src="img/logo.jpeg" alt="Bosque das Chaves">
            <h1>Bosque das Chaves</h1>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Encontre a entrada para seu lar mágico">
            <button>Buscar</button>
        </div>

        <div class="perfil-link"></div>

    </div>

    <nav class="menu">

        <div class="menu-links">
            <a href="#">Início</a>
            <a href="#">Sobre nós</a>
            <a href="#">Todos os Imóveis</a>
        </div>

        <div class="botoes">
            <button class="perfil-btn">Meu perfil</button>
            <button class="sair-btn">Sair</button>
        </div>

    </nav>

</header>

<main class="perfil-page">

    <section class="perfil-card">

        <section class="perfil-capa">
            <span>Imagem de capa</span>
        </section>

        <section class="perfil-dados">

            <div class="foto-vendedor">
                <img src="vendedor.jpeg" alt="">
            </div>

            <div class="info-vendedor">
                <h1>Imobiliária 1</h1>
                <p>Vendedor verificado</p>

                <div class="dados-contato">
                    <span>contato@imobiliaria1.com</span>
                    <span>Juazeiro do Norte - CE</span>
                    <span>(88) 99999-9999</span>
                    <span>CRECI: 00000</span>
                </div>
            </div>

            <button class="editar-perfil">Editar perfil</button>

        </section>

        <section class="sobre-vendedor">

            <h2>Sobre o vendedor</h2>

            <p>
                A Imobiliária 1 conecta pessoas aos seus lares ideais, oferecendo
                imóveis para venda e aluguel com atendimento personalizado, cuidado
                nos detalhes e foco em segurança durante toda a negociação.
            </p>

        </section>

        <section class="imoveis-section">

            <h2>Imóveis para alugar</h2>

            <div class="carrossel-imoveis">

                <div class="imovel-card">
                    <img src="img/casa1.jpg" alt="Casa para alugar">
                    <div class="imovel-info">
                        <h3>Casa no bairro Lagoa Seca</h3>
                        <p>3 quartos • 2 banheiros • garagem</p>
                        <strong>R$ 2.500/mês</strong>
                    </div>
                </div>

                <div class="imovel-card">
                    <img src="img/apartamento1.webp" alt="Apartamento para alugar">
                    <div class="imovel-info">
                        <h3>Apartamento no centro</h3>
                        <p>2 quartos • varanda • elevador</p>
                        <strong>R$ 1.800/mês</strong>
                    </div>
                </div>

                <div class="imovel-card">
                    <img src="img/casa2.webp" alt="Casa para alugar">
                    <div class="imovel-info">
                        <h3>Casa com área verde</h3>
                        <p>4 quartos • quintal • área gourmet</p>
                        <strong>R$ 3.200/mês</strong>
                    </div>
                </div>

                <div class="imovel-card">
                    <img src="img/apartamento2.jpg" alt="Studio para alugar">
                    <div class="imovel-info">
                        <h3>Studio mobiliado</h3>
                        <p>1 quarto • compacto • mobiliado</p>
                        <strong>R$ 1.300/mês</strong>
                    </div>
                </div>

            </div>

        </section>

        <section class="imoveis-section">

            <h2>Imóveis à venda</h2>

            <div class="carrossel-imoveis">

                <div class="imovel-card">
                    <img src="img/chale1.jpg" alt="Casa à venda">
                    <div class="imovel-info">
                        <h3>Residência dos Sonhos</h3>
                        <p>4 quartos • piscina • jardim</p>
                        <strong>R$ 350.000</strong>
                    </div>
                </div>

                <div class="imovel-card">
                    <img src="img/casa4.webp" alt="Casa à venda">
                    <div class="imovel-info">
                        <h3>Casa familiar</h3>
                        <p>3 quartos • suíte • garagem</p>
                        <strong>R$ 280.000</strong>
                    </div>
                </div>

                <div class="imovel-card">
                    <img src="img/apartamento 3.jpg" alt="Apartamento à venda">
                    <div class="imovel-info">
                        <h3>Apartamento premium</h3>
                        <p>3 quartos • varanda gourmet • elevador</p>
                        <strong>R$ 420.000</strong>
                    </div>
                </div>

                <div class="imovel-card">
                    <img src="img/casa5.jpg" alt="Casa à venda">
                    <div class="imovel-info">
                        <h3>Casa com quintal</h3>
                        <p>2 quartos • quintal • ótima localização</p>
                        <strong>R$ 240.000</strong>
                    </div>
                </div>

            </div>

        </section>

    </section>

</main>

</body>
</html>