// imprimir numeros pares de 1 a 20.

for(let i = 2; i <= 1000; i++){
    if(i % 2 === 0){
        console.log(i);
    }
}

/* for(let i = 1; i <= 20; i++){
    if(i % 2 !== 0){
        continue;
    }
    console.log(i);
} */


// calcular soma de numeros

let soma = 0;
for(let i = 1; i<=100; i++){
    soma += i;
}
console.log(soma);

// calcular o fatorial de um numero fornecido pelo usuario

const readLineSync = require("readline-sync"); 
let numero = readLineSync.question("Digite um numero: ")
//let numero = 10;

numero = Number(numero);
while(true){
    if(isNaN(numero) || numero === undefined){
        numero = Number(readLineSync.question('Digite um número valido: '))
    }
    else{
        break
    }
    
}
let factorial = 1;

for(let i = 1; i <= numero; i++){
    factorial *= i;
}

console.log(`O fatorial de ${numero} é ${factorial}`);