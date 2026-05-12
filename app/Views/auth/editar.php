<?php 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Bosque das Chaves</title>
    <link rel="stylesheet" href="/crud-imobiliaria/public/css/editar.css">
</head>
<body>

<header class="navbar">
    <div class="top-header">
        <div class="logo">
            <img src="/crud-imobiliaria/public/img/logo.jpeg" alt="Bosque das Chaves">
            <h1>Bosque das Chaves</h1>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Encontre a entrada para seu lar mágico">
            <button type="button">Buscar</button>
        </div>
    </div>

    <nav class="menu">
        <div class="menu-links">
            <a href="index.php">Início</a>
            <a href="#">Sobre nós</a>
            <a href="#">Todos os Imóveis</a>
        </div>
        <div class="botoes">
            <a href="#" class="perfil-btn">Meu perfil</a>
            <a href="#" class="sair-btn">Sair</a>
        </div>
    </nav>
</header>

<main class="editar-page">
    <section class="editar-card">
        <div class="editar-topo">
            <h1>Editar perfil</h1>
            <p>Atualize as informações da imobiliária exibidas no perfil do vendedor.</p>
        </div>

        <form action="../app/controllers/atualizar_perfil.php" method="POST" enctype="multipart/form-data">

            <section class="imagens-perfil">
                <div class="campo-imagem capa-edicao">
                    <label>Foto de capa</label>
                    <div class="preview-capa">
                        <span>Imagem de capa</span>
                    </div>
                    <input type="file" name="foto_capa">
                </div>

                <div class="campo-imagem foto-edicao">
                    <label>Foto do vendedor</label>
                    <div class="preview-foto">
                        <img src="/crud-imobiliaria/public/img/vendedor.jpeg" alt="Preview">
                    </div>
                    <input type="file" name="foto_vendedor">
                </div>
            </section>

            <div class="form-grid">
                <div class="campo">
                    <label for="nome">Nome da imobiliária</label>
                    <input type="text" id="nome" name="nome_imobiliaria" value="Imobiliária 1" required>
                </div>

                <div class="campo">
                    <label for="email">E-mail de contato</label>
                    <input type="email" id="email" name="email_contato" value="contato@imobiliaria1.com" required>
                </div>

                <div class="campo">
                    <label for="telefone">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" value="(88) 99999-9999">
                </div>

                <div class="campo">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" value="Juazeiro do Norte - CE">
                </div>

                <div class="campo">
                    <label for="creci">CRECI</label>
                    <input type="text" id="creci" name="creci" placeholder="Digite o CRECI">
                </div>
            </div>

            <div class="campo campo-textarea">
                <label for="sobre">Sobre o vendedor</label>
                <textarea id="sobre" name="sobre_vendedor">A Imobiliária 1 conecta pessoas aos seus lares ideais...</textarea>
            </div>

            <div class="acoes-form">
                <button type="button" class="cancelar" onclick="window.history.back()">Cancelar</button>
                <button type="submit" class="salvar">Salvar alterações</button>
            </div>
        </form>
    </section>
</main>

</body>
</html>