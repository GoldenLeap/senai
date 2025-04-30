/*
    Crie um programa que solicite um numero de 1 a 12
    representando os meses do ano, e exiba as estações do ano correspondente
*/


function estacaoAno(){
    const estacaoNum = parseInt(document.getElementById("estacaoNum").value);
    let estacao;
    switch (estacaoNum){
        case 1:
        case 2:
        case 12:
            estacao = 'Verão';
            break;
        case 3:
        case 4:
        case 5:
        case 6:
            estacao = 'Outono';
            break;
        case 7:
        case 8:
        case 9:
            estacao = 'Inverno';
            break;
        case 10:
        case 11:
            estacao = 'Primavera';
            break;
        default:
            estacao = 'Invalida';
    }
    document.getElementById("resultadoEstacao").innerHTML = `Estação: ${estacao}`
}