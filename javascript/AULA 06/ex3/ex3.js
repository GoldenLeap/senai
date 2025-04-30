let quant = 0;

const quantLabel = document.getElementById("resultado1");
const redLabel = document.getElementById("resultado2");
const customMsg = document.getElementById("customMsg");
let resultado = document.querySelector("#res");

function contador(){
    quant++;
    resultado.innerHTML = `<p>Agora o contador está em <mark>${quant}</mark></p>`;
}

function diminuir(){
    if(quant > 0){
        quant--;
    }
    res.innerHTML = `<p>Agora o contador está em <mark>${quant}</mark></p>`
}
function zerar(){
    quant = 0;
    resultado.innerHTML = `Contador zerado: ${quant}`;
}
