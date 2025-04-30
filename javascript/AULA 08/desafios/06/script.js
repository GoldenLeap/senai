const placa = document.getElementById("placa");
const total = document.getElementById('total');

function verificarPlaca(){
    if(placa.value[0] === 'A' && placa.value[1] === 'B' && placa.value[2] === 'C'){
        total.innerHTML = `Nenhuma tarifa a ser paga`;
    }
    else{
        total.innerHTML = `Tarifa de R$1,00 a ser paga`;
    }
}