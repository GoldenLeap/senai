const meses = ['janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro']
const listaMeses = document.getElementById("meses");
function exibirMeses(){
    meses.forEach(m =>{
        listaMeses.innerHTML += `${m}<br>`
    })
}