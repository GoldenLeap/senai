let result = document.getElementById("result");
function convertToDollar(){
    let valor = Number(prompt("Insira o valor a ser convertido para Dolar"));
    let dol = 5.8
    let dolVal = valor / dol; 
    result.innerHTML = `<p>O Dolar atualmente está valendo R$${dol}</p>`
    result.innerHTML += `<p>R$${valor} é igual a $${dolVal.toFixed(2)}.`
}
function convertToReal(){
    let valor = Number(prompt("Insira o valor a ser convertido para Real"));
    let dol = 5.8
    let dolVal = valor * dol; 
    result.innerHTML = `<p>O Dolar atualmente está valendo R$${dol}</p>`
    result.innerHTML += `<p>$${valor} é igual a R$${dolVal.toFixed(2)}.`
}