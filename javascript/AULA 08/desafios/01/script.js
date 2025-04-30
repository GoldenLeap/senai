/*
O Café Expresso oferece um menu com as seguintes opções:
Café Expresso: R$ 5,00
Cappuccino: R$ 8,00
Chocolate Quente: R$ 7,50
Chá: R$ 4,00
Crie um programa que:
● Exiba o menu para o cliente.
● Receba a opção escolhida pelo cliente.
● Calcule o valor total do pedido.
● Exiba o pedido e o valor total para o cliente.
*/


const opcoes = [
  ["Café Expresso", 5.0],
  ["Cappuccino", 8.0],
  ["Chocolate Quente", 7.5],
  ["Chá", 4.0],
];

function showMenu(){
    let opt = 'Escolha uma opção:\n'
    let num = 1;
    opcoes.forEach(e =>{
        opt+= `•\t${num} - ${e[0]} - R$${e[1].toFixed(2)}\n` ;
        num++
    })
    console.log(opt);
    let choice;
    while(true){
        choice = parseInt(prompt(opt));
        if(choice >= 1 && choice <= opcoes.length){
            break
        }
        else{
            alert(`Opção invalida por favor escolha um valor de 1 a ${opcoes.length}`)
        }
    }

    alert(`Você escolheu ${opcoes[choice-1][0]} e o total vai ser de R$${opcoes[choice-1][1].toFixed(2)}`);
}

