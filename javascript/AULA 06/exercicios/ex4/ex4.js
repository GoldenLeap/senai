const info = document.getElementById("info");

function calcTroco(){
    let produto = prompt("Qual produto você deseja comprar?");
    let preco =  Number(prompt("Qual é o preço do produto?"));
    let pag = Number(prompt("Qual o valor que você pagou?"));
    let troco = pag - preco;
    info.innerHTML = `<p>Produto comprado: ${produto}</p>`
    info.innerHTML += `<p>Preço produto: R$${preco.toFixed(2)}</p>`
    info.innerHTML += `<p>Valor dado: R$${pag.toFixed(2)}</p>`
    if(troco >0){
        info.innerHTML += `<p>Troco esperado: R$${troco.toFixed(2)}</p>` 
    }
    else{
        info.innerHTML += `<p>Divida: R$${troco.toFixed(2)*-1}</p>`
    }
    
}