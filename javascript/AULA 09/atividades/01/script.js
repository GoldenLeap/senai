// Crie um programa para simular um semaforo de alteração com as
// cores padrão (Verde, Vermelho, Laranja). O cenário deve ser por
// opção que quando inserir o valor 1 por exemplo, apresenta a
// mensagem Vermelho.

const val = document.getElementById("semaforoVal");
const semaforo = document.getElementById("semaforo")
function definirSemaforo(){
    switch(parseInt(val.value)){
        case 3:
            semaforo.style.backgroundColor = "red";
            break
        case 2:
            semaforo.style.backgroundColor = "yellow";
            break;
        case 1:
            semaforo.style.backgroundColor = "green";
            break;
        default:
            semaforo.style.backgroundColor = "gray";
            break;
    }
}