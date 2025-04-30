
function calcular(){
    const tipo = document.getElementById("tipo").value;
    const qnt = parseInt(document.getElementById("quantidade").value);
    const valTot = document.getElementById("total");
    const valDesc = document.getElementById("desconto");
    let msg;
    if(qnt && qnt > 0){
        switch(tipo){
            case("1"):
                total = qnt * 20.9; 
                break;
            case("2"):
                total = qnt * 100.40;
                break;
            case("3"):
                total = qnt * 200.49;
                break;
            default:
                msg = "Número ou tipo Invalido";
                valTot.innerHTML = 'Inválido'
                valDesc.innerHTML = 'Inválido'
                break;
        }
        valTot.innerHTML = `R$${total.toFixed(2)}`;
        if(total >= 100){
            valDesc.innerHTML = `R$${(total - total * .1).toFixed(2)}`;
        }
        else{
            valDesc.innerHTML = "Indisponivel";
        }
    }
    else{
        alert("Insira os valores nos campos abaixo.")
    }
    

}
