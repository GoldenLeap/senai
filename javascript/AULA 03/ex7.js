/*
Desafio 1
Criar um algoritmo para separar valores pares e impares
*/

let num = 21;
if(num % 2 === 0){
    console.log(`${num} é um numero par`);
}else{
    console.log(`${num} é um numero impar`);
}

/*
Desafio 2
Criar um algoritmo para calcular valores com as expressões  soma, subtração, multiplicação e divisão
*/

let exp = 'multiplicar';
let num1 = 10;
let num2 = 20;
let resultado;
if(exp === 'multiplicar'){
    resultado = `${num1} * ${num2} = ${num1 * num2}`;
}
else if(exp === 'dividir'){
    resultado = `${num1} / ${num2} = ${num1 / num2}`;
}
else if(exp === 'somar'){
    resultado = `${num1} + ${num2} = ${num1 + num2}`;
}
else if(exp === 'subtrair'){
    resultado = `${num1} - ${num2} = ${num1 - num2}`;
}
console.log(resultado);

// Desafio 2 //
/*

Solução 1

let num1 = 5;
let num2 = 10;
let operador = '+';
if(operador==='+'){
    console.log(`\n ${num1} + ${num2} = ${num1 + num2}\n`)
}
*/

/*

Solução 2

let num1 = 5;
let num2 = 10;
let conta = 1;
if(conta ===1){
    let resultado = num1 + num2;
    console.log(resultado)
}
*/

/*

Solução 3

let num1 = 5;
let num2 = 10;
let conta = 'multiplicar';
if(conta ===1){
    let resultado = num1 + num2;
    console.log(resultado)
} 
*/

/*

Solução 4

let edu1 = 10;
let edu2 = 20;
let soma = edu1 + edu2;

let equacao = 'soma'
if(equacao === 'soma'){
    console.log("A soma foi" + soma)
}
*/


/*

Solução 5

let a = 10;
let b = 5;

let haysoma = a + b;
let haysub = a - b;
let haymult = a * b;
let haydiv =  a / b;
console.log("Resultado soma:" + haysoma);
console.log("Resultado subtração:" + haysub);
console.log("Resultado multiplicação:" + haymult);
console.log("Resultado divisão:" + haydiv);
*/

//---------------------------------------------------------------------------//