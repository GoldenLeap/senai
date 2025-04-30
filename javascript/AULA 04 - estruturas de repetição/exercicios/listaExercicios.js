const rlSync = require('readline-sync');



// Crie um algoritmo que imprima 11 vezes a palavra "Olá, Mundo"



for(i=1; i<=11; i++){
    console.log(i + ' - '+ 'Olá, mundo!');
}

// Faça uma tabuada
console.log('------------------------------------------------------------------');
console.log('Tábuada de um numero especifico');
console.log('------------------------------------------------------------------');

let num1 = Number(rlSync.question('Digite um número: '));
while(true){
    if(isNaN(num1) || num1 === undefined){
        num1 = Number(rlSync.question('Digite um número valido: '));
    }
    break;
}
console.log(`Tabuada do ${num1}:`)
for(i=1; i<=10; i++){
    console.log(`${num1} X ${i} = ${num1 * i}`);
}

console.log('------------------------------------------------------------------');
console.log('Soma numeros impares de 1 a 100');
console.log('------------------------------------------------------------------');

// Soma dos numeros impares do 1 ao 100
let soma = 0;
for(i=1; i<=100; i++){
    if(i %2 !==0){
        soma+=i;
    };
}
console.log(`A soma dos números impares de 1 a 100 é: ${soma}`);

// Fazer contagem regressiva de 10 a 1 e no final a mensagem "Feliz ano novo"
console.log('------------------------------------------------------------------');
console.log('Contagem regressiva ano novo');
console.log('------------------------------------------------------------------');

for(i=10; i>0; i--){
    console.log(i);
}
console.log('Feliz ano novo!🎆');
console.log('------------------------------------------------------------------');