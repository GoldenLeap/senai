const num = document.getElementById("number")
function antecessor(){
    let val = Number(prompt("Digite um numero para ver o antecessor dele:"));
    val--;
    num.innerHTML = `<p>O antecessor de ${val+1} é ${val}</p>`;

}
function sucessor(){
    let val = Number(prompt("Digite um numero para ver o sucessor dele:"));
    val++;
    num.innerHTML = `<p>O sucessor de ${val-1} é ${val}</p>`;
}