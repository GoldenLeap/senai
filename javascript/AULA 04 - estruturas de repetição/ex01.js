// laços de repetição

//for 
/*
    for(condição){
        bloco de codigo
    }
*/
for(let i= 10;i < 20; i++){
    console.log(i);
}
console.log('-------------------------------');
for(let i = 10; i >= 0; i--){
    console.log(i);
}
console.log('-------------------------------');
for(let i =0; i <= 100; i += 10){
    console.log(i);
}
console.log('-------------------------------');
/*
    While
    while(condicao){
        bloco de codigo
    }
*/

let i = 20;

while(i <= 10){
    console.log(i);
    i++;
}
line()

let j = 10;

while(j > 0){
    console.log(j);
    j--
    
}
line();

while (i<=100){
    console.log(i);
    i += 10;
}







function line(){
    console.log('-------------------------------');
}

/* Do while
    do{
        bloco de codigo
    }
    while(condição);
*/

line();

let k = 9;

do{
    console.log(k);
    k++
}while(k < 10);

line();

k = 15;

do while(k<25){
    console.log(k);
    k++;
}while(k < 15);

line();

let l = 0;

do{
    console.log(l);
    l += 10;
} while(l <= 100);

line();

// break
for(let i = 0; i <= 10; i++){
    if(i===5){
        break;
    }
    console.log(i);
}

line()

// continue
for(let i = 0; i < 10; i++){
    if(i===5){
        continue;
    }
    console.log(i);
}

line()

