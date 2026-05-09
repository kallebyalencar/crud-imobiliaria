const urlParams = new URLSearchParams(window.location.search);
const productId = parseInt(urlParams.get("id"), 10);

fetch("assets/data/imoveis.json")
  .then(response => response.json())
  .then(products => {
    const product = products.find(p => p.id === productId);

    const container = document.getElementById("product-container");

    if (!product) {
      container.innerHTML = "<p>Produto não encontrado.</p>";
      return;
    }

    container.innerHTML = `
      <div class="product-image">
        <img src="${product.image}" alt="${product.title}">
      </div>
      <div class="product-info">
        <h1>${product.title}</h1>
        <p class="location">${product.location}</p>
        <p>${product.description}</p>
        <div class="product-price">R$ ${product.price}</div>
        <button class="btn">Alugar agora</button>
      </div>
    `;
  })
  .catch(error => console.error("Erro ao carregar produto:", error));
