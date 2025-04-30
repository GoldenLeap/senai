/*
    Crie um programa que calcule a area de um circulo, quadrado
    e triangulo. O usuario deve informar o tipo da figura
    e as dmensões necessárias. O programa deve exibir a área calculada
*/

const PI = 3.14;
const opt = document.getElementById("opcao");
const circ = document.getElementById("circulo");
const quad = document.getElementById("quad");
const tri = document.getElementById("triangulo");

function atualizar() {
    switch (opt.value) {
        case "1":  // Circulo
            circ.classList.remove("hidden");
            quad.classList.add("hidden");
            tri.classList.add("hidden");
            break;
        case "2":  // Triangulo
            circ.classList.add("hidden");
            tri.classList.remove("hidden");
            quad.classList.add("hidden");
            break;
        case "3":  // Quadrado
            circ.classList.add("hidden");
            quad.classList.remove("hidden");
            tri.classList.add("hidden");
            break;
        default:
            break;
    }
        document.getElementById("resultadoArea").innerHTML = '';
}

function calcularArea(){
    const raio = parseFloat(document.getElementById("raio").value)
    const base = parseFloat(document.getElementById("base").value)
    const altura = parseFloat(document.getElementById("altura").value)
    const comprimento = parseFloat(document.getElementById("comprimento").value)
    let area;
    switch (opt.value){
        case "1":  // Circulo
            area = PI * (raio * raio);
            break;
        case "2":  // Triangulo
            area = base * altura / 2;
            break;
        case "3":  // Quadrado
            area = comprimento * comprimento;
            break;
        default:
            break;
    }
    document.getElementById("resultadoArea").innerHTML = `Area: ${area}cm²`;
}