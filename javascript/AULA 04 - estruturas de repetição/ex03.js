let frutas = ["maçã", "banana", "laranja"];
for(let i = 0; i < frutas.length; i++){
    console.log(frutas[i]);
}



for(fruta in frutas){
    console.log(frutas[fruta]);
}
console.log('-----------------------------------------------------')

let alunos = ['Amanda', 'André', 'João','Carla','Carlos','Eduardo'];
for(let i=0; i < alunos.length; i++){
    console.log(aluno[i]);
}









/* class Aluno {
    constructor(nota, nome) {
        this.nota = nota;
        this.nome = nome
    }
}
 */
/* let alunos = [new Aluno(1,'João'),
    new Aluno(Math.floor(Math.random() * 10),'Pedro'),
    new Aluno(Math.floor(Math.random() * 10),'Marcelo'),
    new Aluno(Math.floor(Math.random() * 10),'Renato'),
    new Aluno(Math.floor(Math.random() * 10),'Maria'),
    new Aluno(Math.floor(Math.random() * 10),'Joana'),
    new Aluno(Math.floor(Math.random() * 10),'Ludmila'),
    new Aluno(Math.floor(Math.random() * 10),'Calabreso'),
];

for(let i= 0; i< alunos.length; i++){
    console.log(`Nome ${alunos[i].nome}
        Nota: ${alunos[i].nota}`)
}

let aluno1 = new Aluno(10, 'Klebin');

console.log(aluno1.nome) */