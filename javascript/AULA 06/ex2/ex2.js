
function media(){
    let res = document.getElementById("situacao");

    let nome= window.prompt("Qual é o nome do aluno?");
    let n1 = Number(window.prompt(`Qual foi a primeira nota de ${nome}?`));
    let n2 = Number(window.prompt(`Alem de ${n1}, qual foi a outra nota de ${nome}?`));
    med = (n1+n2)/2;
    let msg;
    if(res.innerHTML){
        res.innerHTML = '';
    }
    if(med >= 6){
        msg = "Meus parabéns";
    }
    else{
        msg="Estude um pouco mais";
    }

    res.innerHTML += `<p>Calculando a média final de <mark>${nome}</mark>.</p>`;
    res.innerHTML += `<p>As notas obtidas foram <mark>${n1}</mark> e <mark>${n2}</mark>.</p>`;
    res.innerHTML += `<p>A media final sera <mark>${med}</mark>.</p>`;
    res.innerHTML += `<p>A mensagem que temos é:</p>`
    res.innerHTML +=  `<strong style='color:red; font-size:20px'>${msg}</strong></p>`;
}
