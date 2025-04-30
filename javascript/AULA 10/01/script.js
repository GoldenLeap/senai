/*
    Crie um programa que converta um valor
    em reais (R$) para dólares ($) e euros
    (€). O usuario deve informar o valor em
    reais e as taxas de cambio atuais. O 
    programa deve exibir o valor convertido em
    dolares e euros.
*/


function converterValor(){
    let valor = parseFloat(document.getElementById("valor").value.replace(",", "."));
    let cotaEuro = 6.35;
    let cotaDolar = 5.81;
    let moeda = parseInt(document.getElementById("moeda").value);
    let conv;
    if(!isNaN(valor) && valor >= 0){
        switch(moeda){
            case 1:
                conv = valor / cotaEuro;
                conv = `€${conv.toFixed(2)}`;
                break;   
            case 2:
                conv = valor / cotaDolar;
                conv = `$${conv.toFixed(2)}`;
                break;
            default:
                conv = "Moeda Invalida";
                break;
        }
    }
    else{
        conv = 'Valor invalido';
    }  
    document.getElementById("resultadoConversao").innerHTML = `Valor convertido: ${conv}`
}