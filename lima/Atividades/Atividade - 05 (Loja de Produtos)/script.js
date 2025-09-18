// Seleciona o botão de alternância e o elemento body

const darkModeToggle = document.getElementById("dark-mode-toggle");
const body = document.body;
const carousel_produtos = document.querySelector("#carousel");
// Verifica se o tema foi salvo no localStorage
const currentTheme = localStorage.getItem("theme");

// Se o tema já foi definido anteriormente, aplica
if (currentTheme) {
    body.setAttribute("data-theme", currentTheme);
}

// Adiciona um evento de clique ao botão de alternância
darkModeToggle.addEventListener("click", () => {
    let theme = body.getAttribute("data-theme");
    localStorage.setItem("theme", theme)
    // Alterna entre os temas
    if (theme === "dark") {
        body.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light"); // Salva a preferência
    } else {
        body.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark"); // Salva a preferência
    }
});

// Função para adicionar item ao carrinho
function adicionarAoCarrinho(produto) {
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    // Verifica se já existe o produto no carrinho
    const existente = carrinho.find(item => item.id === produto.id);
    if (existente) {
        existente.qtd += 1;
    } else {
        produto.qtd = 1;
        carrinho.push(produto);
    }
    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    alert(`Produto "${produto.nome}" adicionado ao carrinho!`);
}


function prepararBotoesComprar() {
    const botoes = document.querySelectorAll('.btn-comprar');
    botoes.forEach(botao => {
        botao.addEventListener('click', function() {
            const card = botao.closest('.product-card');
            const id = card.getAttribute('data-id');
            const nome = card.querySelector('h3').innerText;
            const categoria = card.querySelector('.category').innerText;
            const preco = card.querySelector('.price').getAttribute('data-price');
            const descricao = card.querySelector('.description').innerText;
            const img = card.querySelector('img').getAttribute('src');
            const produto = {
                id,
                nome,
                categoria,
                preco: parseFloat(preco),
                descricao,
                img
            };
            adicionarAoCarrinho(produto);
        });
    });
}

// Inicializa os eventos ao carregar a página
document.addEventListener('DOMContentLoaded', prepararBotoesComprar);