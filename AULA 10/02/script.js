/*
    CRIE UM PROGRAMA QUE SOLICITE
    UMA NOTA DE 0 A 20
    E EXIBA A CLASSIFICAÇÃO
    (A, B, C, D OU F)
*/

function classificarNota(){
    const notaAluno = parseFloat(document.getElementById("nota").value)
    let classificacao;
    switch (notaAluno) {
        case 10:
        case 9:
            classificacao = 'A';
            break;
        case 8:
        case 7:
            classificacao = 'B';
            break;
        case 6:
        case 5:
        case 4:    
            classificacao = 'C';
            break;
        case 3:
        case 2:
        case 1:
            classificacao = 'D';
            break;
        case 0:
            classificacao = 'F';
            break;
        default:
            classificacao = 'Nota invalida!';
            break;
    }
    document.getElementById("resultadoNotas").innerHTML = `Classificação: ${classificacao}.`


}