// Crie um programa que calcule o Índice de Massa Corporal (IMC)
// de uma pessoa.
// O programa deve solicitar ao usuário que insira seu nome, peso
// (em kg) e altura (em metros). Após calcular o IMC, o programa
// deve exibir o resultado e classificar o IMC de acordo com as
// seguintes categorias:
// Abaixo do peso: IMC menor que 18,5
// Peso normal: IMC entre 18,5 e 24,9
// Sobrepeso: IMC entre 25 e 29,9
// Obesidade: IMC 30 ou mais
// Ao final, apresentar o nome do cliente e o resultado.
const ePeso = document.getElementById("peso");
const eAltura = document.getElementById("altura");
const eResultado = document.getElementById("imc");
const eName = document.getElementById("nome");
function calcularIMC() {
    let peso = parseFloat(ePeso.value);    
    let altura = parseFloat(eAltura.value);
    let imc = peso / (altura * altura);
    let resultado = '';

    if (imc < 18.5) {
        resultado = 'Abaixo do peso';
    } else if (imc >= 18.5 && imc < 25) {
        resultado = 'Peso Normal';
    } else if (imc >= 25 && imc < 30) {
        resultado = 'Sobrepeso';
    } else if (imc >= 30){
        resultado = 'Obesidade'
    }

    eResultado.innerHTML = `Nome: ${eName.value}<br>IMC de ${imc.toFixed(2)} - ${resultado}`;
}
