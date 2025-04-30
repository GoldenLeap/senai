// O programa que irá criar deverá apresentar as opções de
// serviços oferecidos por um menu. A partir da escolha do serviço,
// ao encerrar deverá apresentar um resumo com serviço realizado
// com o nome do cliente e valor total final.

const pedidos = [['Troca de óleo', 149.99], ['Manutenção de freios', 200.00], ['Troca de Pneus', 200.00]]
const nome = document.getElementById("nome")
const choice = document.getElementById("num")

function solicitarServico(){
    if(nome.value && choice.value){
        alert(`Nome do cliente: ${nome.value}\nServiço solicitado: ${pedidos[choice.value -1][0]}\nTotal a ser cobrado: R$${parseInt(pedidos[choice.value][1]).toFixed(2)}`)
    }
    else{
        alert("Preencha todos os campos")
    }
}