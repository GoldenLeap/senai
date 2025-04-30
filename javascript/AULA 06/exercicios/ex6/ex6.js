const info = document.getElementById("info");

function vender(){
    let nome = prompt("Você escolheu a opção de vender.\nQual o nome do filme que deseja vende?")
    let preco = Number(prompt("Qual o preço do filme: "));
    info.innerHTML = `<p>Informações do filme a ser vendido.</p>`;
    info.innerHTML += `<p>Nome: ${nome}.</p>`;
    info.innerHTML += `<p>Preço: R$${preco}.</p>`;
}
function alugar(){
    let nome = prompt("Você escolheu a opção de alugar.\nQual o nome do filme que deseja alugar?");
    let preco = Number(prompt("Qual o preço do filme: "));
    info.innerHTML = `<p>Informações do filme a ser alugado.</p>`;
    info.innerHTML += `<p>Nome: ${nome}</p>`;
    info.innerHTML += `<p>Preço: R$${preco}</p>`;
}
function comprar(){
    let nome = prompt("Você escolheu a opção de comprar.\nQual o nome do filme que deseja comprar?");
    let preco = Number(prompt("Qual o preço do filme: "));
    info.innerHTML = `<p>Informações do filme a ser comprado.</p>`;
    info.innerHTML += `<p>Nome: ${nome}.</p>`;
    info.innerHTML += `<p>Preço: R$${preco}.</p>`;
}