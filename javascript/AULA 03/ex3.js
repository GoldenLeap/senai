// condicionais com if e else if

let nota = 75;

if(nota>=80){
    console.log('Parabéns você foi aprovado(a)!');
}
else if(nota < 80 && nota >= 60){
    console.log('Você está na nossa lista de espera');
}
else{
    console.log('Você foi reprovado(a)');
}

// vacinar

let idade = 60;

if(idade >= 60){
    console.log('Pode vacinar');
}else if(idade >= 15 && idade <60){
    console.log('Pode pensar em vacinar');
}
else{
    console.log('Não pode vacinar');
}