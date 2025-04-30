const rlSync = require('readline-sync');

// Verificação de categoria de idade EX 1
title('Verificação de idade')
let idade = Number(rlSync.question('Qual é a idade da pessoa: '));
while (true) {
    if (isNaN(idade) || idade === undefined || idade === 0 || idade <= 0) {
        idade = Number(rlSync.question('Insira uma idade valida maior que 0: '))
    }
    else {
        break;
    }
}

if (idade > 50) {
    console.log(`A pessoa tem: ${idade} anos e é idoso(a)`)
}
else if (idade > 18) {
    console.log(`A pessoa tem: ${idade} anos e é um adulto.`)
}
else if (idade > 12) {
    console.log(`A pessoa tem: ${idade} anos e é um adolescente.`)
}
else if (idade < 12) {
    console.log(`A pessoa tem: ${idade} anos e é uma criança.`)
}
else {
    console.log('Ocorreu um erro ao verificar a idade da pessoa.')
}

// Verificação de nota com mensagem
title('Verificação de notas')
let nota = Number(rlSync.question('Digite a nota do aluno: '));
while (true) {
    if (isNaN(nota) || nota < 0 || nota > 10) {
        nota = Number(rlSync.question('Digite uma nota valida entre 0 e 10: '));
    }
    else {
        break;
    }
}


if (nota >= 8) {
    console.log(`O aluno tirou nota ${nota}, excelente.`);
}
else if (nota >= 6) {
    console.log(`O aluno tirou nota ${nota}, é acima da média mas dá para melhorar.`);
}
else {
    console.log(`O aluno tirou nota ${nota} e está de recuperação.`);
}

// Verificação de dia da semana
title('Verificação dia da semana');

let diaSemana = new Date().getDay();
if (diaSemana !== 0 || diaSemana !== 6) {
    console.log('É dia de trabalho');
}
else {
    console.log('Aproveite o final de semana.');
}

// Verificação de horario do dia
title('Verificação horario do dia');
let currTime = 16;
if (currTime < 12) {
    console.log('Tenha um bom dia.')
}
else if (currTime < 18) {
    console.log('Tenha uma boa tarde.')
}

else {
    console.log('Tenha uma boa noite.')
}
// Verificar indice de massa corporal
title('Verificação IMC')
let altura = rlSync.questionFloat('Qual é a sua altura?')

let peso = rlSync.questionFloat('Qual é o seu peso?')
let imc = peso / altura;
if (imc > 39.9) {
    console.log(`IMC de ${imc} - Obesidade classe III`)
}
else if (imc > 34.9) {
    console.log(`IMC de ${imc} - Obesidade classe II`);
}
else if (imc > 29.9) {
    console.log(`IMC de ${imc} - Obesidade classe I`);
}
else if (imc > 24.9) {
    console.log(`IMC de ${imc} - Excesso de peso`);
}
else if (imc > 18.5) {
    console.log(`IMC de ${imc} - Peso normal`);
}
else {
    console.log(`IMC de ${imc} - Abaixo do peso normal`)
}
// Verificar se o numero é primo

title('Verificar se um numero é primo');

let num = rlSync.questionInt('Digite um numero: ');
let isPrime = true;

for(let i = 3; i < num; i++){
    if(num % i === 0){
        isPrime = false;
    }
}

if (isPrime){
    console.log(`O numero ${num} é primo`)  
}
else{
    console.log(`O numero ${num} não é primo`)
}

// Verificação ano bissexto
title('Verificar se o ano é bissexto')
let ano = Number(rlSync('Digite o ano que quer verificar se é bissexto: '))
while(true){
    if(ano < 1 || isNaN(ano) || ano === undefined){
        ano = Number(rlSync('Digite um ano valido: '))
    }
    else{
        break;
    }
}
if(ano %4 === 0 && ano %100 !== 0 && ano % 400 === 0){
    console.log(`O ano ${ano} é bissexto`);
}
// Verificação de nota com mensagem personalizada
title('Verificação de notas com mensagem personalizada');
let notaAluno = 85;

if(notaAluno>=90){
    console.log('Excelente');
}
else if(notaAluno >= 80 ){
    console.log('Bom');
}
else if(notaAluno >=70){
    console.log('Aceitavel')}
else if(notaAluno >=60){
    console.log('Precisa melhorar')}
else if(notaAluno >=50){
    console.log('Ruim')
}
else{
    console.log('Você precisa estudar');
}
// Verificação de temperatura com mensagem

title('Verificar temperatura com mensagem');
let temp = 20;
if(temp > 20){
    console.log(`Está fazendo ${temp}ºC, melhor passar um protetor solar`)
}
else{
    console.log(`Está fazendo ${temp}º, melhor colocar uma blusa.`)
}

// Verificar desempenho vendas
title('Verificar desempenho vendas')
let vendasMes = Number(rlSync('Quantas vendas você fez no mês'));
while(true){
    if(vendasMes < 0 || isNaN(vendasMes)){
        vendasMes = Number(rlSync('Digite um valor valido: '))
        continue;
    }
    break;
}
if(vendasMes > 10000){
    console.log('As vendas desse mês foram excelentes');
}
else if(vendasMes > 5000){
    console.log('As vendas desse mês foram boas');
}
else if(vendasMes > 1000){
    console.log('As vendas desse mês foram aceitaveis');
}
else{
    console.log('As vendas desse mês foram ruins');
}


function title(msg) {
    console.log('--------------------------------------');
    console.log(msg);
    console.log('--------------------------------------');

}
