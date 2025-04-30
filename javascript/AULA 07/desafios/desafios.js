// Calcular a média de um vetor(putz...)
function calcularMedia(){
    const vetorMedia = document.getElementById("mediaVetorValor").value.split(",").map(Number);
    let soma = 0;
    let total = 0;
    let media = 0;
    for(let i = 0; i < vetorMedia.length; i++){
        total++
        soma += vetorMedia[i];
    }
    media = soma/ total;
    document.getElementById("mediaVetor").innerHTML = `Média: ${media}`
}

//Valor Maior em uma lista
function maiorValor(){
    const maiorValor = document.getElementById("maiorVetorValor").value.split(",").map(Number);
    let maior = maiorValor[0];
    for(let i= 1; i < maiorValor.length; i++){
        if(maiorValor[i] > maior){
            maior = maiorValor[i];
        }
    }
    document.getElementById("maiorValor").innerHTML = `Maior valor: ${maior}.` 
}

//Contar numeros impares
function imparesMatriz(){
    const imparesVetor = document.getElementById("imparesMatrizValor").value.split(",").map(Number);
    const matriz = [];
    let imparesMatriz = [];
    for(let i =0; i<4; i++){
        matriz[i] = imparesVetor.slice(i*4, (i+1)*4)
    }
    let impares =0;
    for(let i =0; i<4; i++){
        for(let j=0; j<4; j++){
            if(matriz[i][j] %2 != 0){
                impares++;
                imparesMatriz.push(matriz[i][j]);
            }
        }
    }
    document.getElementById("valorImpares").innerHTML = `Qnt Impares: ${impares}<br>Impares: ${imparesMatriz}.`
}