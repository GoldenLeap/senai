function calcIdade(){
    let dataAtual = new Date(); 
    let ano = dataAtual.getFullYear();

    let nasc = Number(window.prompt("Em que ano você nasceu?"));
    while(nasc < 0|| isNaN(nasc) || nasc < ano - 120){
        nasc = Number(window.prompt("Em que ano você realmente nasceu?"));
    }
    let idade = ano - nasc;

    let saida = document.getElementById("idade");
    saida.innerHTML = `<p>Quem nasceu em ${nasc} vai completar <strong>${idade}</strong> anos em ${ano}.</p>`
}