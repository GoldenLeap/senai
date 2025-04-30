const sigla = document.getElementById("sigla");
const local = document.getElementById('local');

function rastrearProduto(){
    let estado;

    if(sigla.value == 'AB'){ estado = 'SP'}
    else if(sigla.value == 'CD'){ estado = 'RJ'}
    else if(sigla.value == 'EF'){ estado = 'MG'}
    else{
        estado = 'Invalido'
    }
    local.innerHTML = `Estado onde o pacote está localizado: ${estado}`
}