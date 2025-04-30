const infos = document.getElementById("info")
function getInfo(){
    let nome = prompt("Insira o seu nome:");
    let idade = Number(prompt("Insira a sua idade:"));
    infos.innerHTML = `<p>As suas informações são</p>`;
    infos.innerHTML += `<p>Nome: ${nome}</p>`;
    infos.innerHTML += `<p>Idade: ${idade}</p>`;
}