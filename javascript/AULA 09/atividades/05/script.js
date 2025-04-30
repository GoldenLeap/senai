// Crie um programa para que seja realizado a reserva de produtos
// para um cliente.
// O sistema deverá exibir uma janela perguntando as informações
// necessárias para o cliente e ao fim da reserva apresentar os
// resultados do produto reservado.
function reservarEntrega(){
    const nome = document.getElementById('nome').value;
    const produto = document.getElementById('produto').value;
    const quantidade = document.getElementById('quantidade').value;
    const endereco = document.getElementById('endereco').value;
    const result = document.getElementById("resultado")
    
    if(nome && produto && quantidade && endereco){
        result.innerHTML = `<h1>Reserva confirmada</h1><br><strong>Nome do Cliente:</strong> ${nome}<br><strong>Endereço de entrega:</strong> ${endereco}<br><strong>Produto:</strong> ${produto}<br><strong>Quantidade:</strong> ${quantidade}`
    }else{
        alert("Preencha todos os campos e selecione o produto desejado.")
    }
}




