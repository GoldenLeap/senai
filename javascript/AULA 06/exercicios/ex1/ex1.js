let resultSec = document.getElementById("result");

function soma(){
    let num1 = Number(prompt("Digite o primeiro valor"));
    let num2 = Number(prompt("Digite o segundo valor"));
    let result = num1 + num2;
    resultSec.innerHTML = `<p>A soma de ${num1} e ${num2} é de: ${result}</p>`;

}
function media(){
    let num1 = Number(prompt("Digite o primeiro valor"));
    let num2 = Number(prompt("Digite o segundo valor"));
    let result = (num1 + num2) / 2;
    resultSec.innerHTML = `<p>A media de ${num1} e ${num2} é de: ${result}</p>`;
}
function multi(){
    let num1 = Number(prompt("Digite o primeiro valor"));
    let num2 = Number(prompt("Digite o segundo valor"));
    let result = num1 * num2;
    resultSec.innerHTML = `<p>${num1} * ${num2} é igual a: ${result}</p>`;
}