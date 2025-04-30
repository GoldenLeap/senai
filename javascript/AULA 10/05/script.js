function exibir() {
    const modeloCarro = document.getElementById("modeloCarro");
    const resultado = document.getElementById("resultado");
    const servicos = document.getElementById("servicos"); // Elemento onde os serviços serão listados
    const valorTotal = document.getElementById("valorTotal"); // Elemento onde o valor total será mostrado

    let msg;
    let servicosRealizados = [];
    let total = 0;

    // Verificar o modelo do carro e exibir as informações
    switch(modeloCarro.value) {
        case "Honda Civic":
            msg = `Preço: R$156.990<br>Ano: 2021<br>Combustível: Gasolina`;
            servicosRealizados = ["Troca de óleo (R$150)", "Revisão de motor (R$500)", "Troca de pastilhas de freio (R$300)"];
            total = 150 + 500 + 300;
            break;
        case "Corolla":
            msg = `Preço: R$139.990<br>Ano: 2022<br>Combustível: Flex`;
            servicosRealizados = ["Troca de óleo (R$130)", "Revisão de motor (R$450)", "Troca de pastilhas de freio (R$280)"];
            total = 130 + 450 + 280;
            break;
        case "Onix":
            msg = `Preço: R$79.990<br>Ano: 2023<br>Combustível: Flex`;
            servicosRealizados = ["Troca de óleo (R$120)", "Revisão de motor (R$400)", "Troca de pastilhas de freio (R$250)"];
            total = 120 + 400 + 250;
            break;
        case "Camaro":
            msg = `Preço: R$299.990<br>Ano: 2021<br>Combustível: Gasolina`;
            servicosRealizados = ["Troca de óleo (R$200)", "Revisão de motor (R$600)", "Troca de pastilhas de freio (R$350)"];
            total = 200 + 600 + 350;
            break;
        default:
            msg = `Informações sobre o modelo Indisponíveis`;
            servicosRealizados = [];
            total = 0;
            break;
    }

    // Exibe as informações do modelo de carro
    resultado.innerHTML = msg;

    // Exibe o relatório de serviços realizados
    if (servicosRealizados.length > 0) {
        let listaServicos = "<strong>Serviços Realizados:</strong><br>";
        servicosRealizados.forEach(servico => {
            listaServicos += `${servico}<br>`;
        });
        servicos.innerHTML = listaServicos;
    } else {
        servicos.innerHTML = "<strong>Sem serviços realizados</strong>";
    }

    // Exibe o valor total dos serviços realizados
    valorTotal.innerHTML = `<strong>Valor Total dos Serviços: R$${total.toFixed(2)}</strong>`;
}
