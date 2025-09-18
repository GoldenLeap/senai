function carregarItems() {
    body.setAttribute("data-theme", localStorage.getItem("theme"))
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    const container = document.getElementById('listaCompras'); 

    if (carrinho.length === 0) {
        return;
    }
    container.innerHTML = '';
    let total = 0;
    const lista = document.createElement('ul');
    lista.className = 'carrinho-lista';

    carrinho.forEach(item => {
        total += item.preco * item.qtd;
        const li = document.createElement('li');
        li.className = 'carrinho-item';
        li.innerHTML = `
            <img src="${item.img}" alt="${item.nome}" style="width:60px;height:60px;border-radius:8px;object-fit:cover;vertical-align:middle;margin-right:10px;">
            <span><strong>${item.nome}</strong> (${item.categoria})</span>
            <span>Qtd: ${item.qtd}</span>
            <span>R$ ${(item.preco * item.qtd).toFixed(2)}</span>
        `;
        lista.appendChild(li);
    });

    container.appendChild(lista);

    const totalDiv = document.createElement('div');
    totalDiv.className = 'carrinho-total';
    totalDiv.innerHTML = `<h3>Total: R$ ${total.toFixed(2)}</h3>`;
    container.appendChild(totalDiv);
    container.appendChild(btnContinuar);
}
function checkout(){
    localStorage.clear()
    location.reload(true)
    
}
document.addEventListener('DOMContentLoaded', carregarItems);