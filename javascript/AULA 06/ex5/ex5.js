function calcular(){
    let preco = Number(prompt("Digite o preço do produto:"))
    let porc  = Number(prompt("Digite o desconto a ser aplicado:"))
    let valor = (preco*porc)/100
    let total = preco - valor
    let res  = document.getElementById("result")
    res.innerHTML = `<p>O produto custa R$${preco.toFixed(2)}.</p>`
    res.innerHTML += `<p>Um desconto de ${porc}% sobre ele será de R$${valor.toFixed(2)}.</p>`
    res.innerHTML += `<p>O valor final a ser pago será de R$${total.toFixed(2)}.</p>`
}

// 
// function calcular(){
//     let preco = Number(document.getElementById("valor").value)
//     let desconto = Number(document.getElementById("desconto").value)
//     let valor = (preco*desconto) / 100;
//     let total = preco - valor;
//     let res = document.getElementById("result");
//     res.innerHTML = `<p>O produto custa R$${preco.toFixed(2)}.</p>`
//     res.innerHTML += `<p>Um desconto de ${desconto}% sobre ele será de R$${valor.toFixed(2)}.</p>`
//     res.innerHTML += `<p>O valor final a ser pago será de R$${total.toFixed(2)}.</p>`
// }

