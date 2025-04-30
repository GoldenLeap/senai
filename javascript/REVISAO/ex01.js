
function exibirSignos(){
    const mes = parseInt(document.getElementById("signo").value);
    const resultNode = document.getElementById("resultado"); 
    let resultado = "";
    switch (mes){
        case 1:
            resultado = "Capricornio e Aquário";
            break;         
        case 2:
            resultado = "Aquário e Peixes";
            break; 
        case 3:
            resultado = "Peixes e Aries";
            break;      
        case 4:
            resultado = "Aries e Touro";
            break;      
        case 5:
            resultado = "Touro e Gemeos";
            break; 
        case 6:
            resultado = "Gemeos e Cancer";
            break;
        case 7:
            resultado = "Cancer e Leão";
            break;         
        case 8:
            resultado = "Leão e Virgem";
            break; 
        case 9:
            resultado = "Virgem e Libra";
            break;      
        case 10:
            resultado = "Libra e Escorpião";
            break;      
        case 11:
            resultado = "Escorpião e Sagitário";
            break; 
        case 12:
            resultado = "Capricornio e Aquario";
            break;

        default:
            resultado = "Inválido";
            break; 
        }
        resultNode.innerHTML = `O mês selecionado foi ${mes} e o signo é ${resultado}`
}