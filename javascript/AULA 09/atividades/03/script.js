// O programa que criar deve calcular as notas que deve ser
// inserido em um prompt ou input assim como o nome do aluno,
// porém as notas serão apresentadas em 3 caixas como Nota1,
// Nota2, Nota3 e trabalhos.
// Ao final deverá ser dividido por 4 é apresentado a mensagem
// com nome do aluno e resultado se foi aprovado ou reprovado ou
// se está de recuperação onde que para ser aprovado o aluno
// deverá tirar 6 no mínimo.
// Se a nota for abaixo de 5 o aluno está reprovado e o intervalo
// desse valor é de recuperação.

const nota1 =  document.getElementById("nota1")
const nota2 = document.getElementById("nota2")
const nota3 = document.getElementById("nota3")
const trabalhos = document.getElementById("trabalhos")
const media = document.getElementById("media")
const estado = document.getElementById("estado")

function calcularNota(){
    let mediaFinal;
    if(nota1.value && nota2.value && trabalhos.value){
        let soma = parseFloat(nota1.value) + parseFloat(nota2.value) + parseFloat(nota3.value) + parseFloat(trabalhos.value);
        mediaFinal = soma / 4;
        media.innerHTML += mediaFinal;
    }
    else{
        alert('Preencha todos os campos')
    }
    if(mediaFinal <= 5){
        estado.innerHTML += 'Recuperação';
    }
    else if(mediaFinal>=6){
        estado.innerHTML += 'Aprovado';
    }
    else{
        return;
    }
}