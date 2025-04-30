const elevador = document.querySelector('.elevador')
const elevadorModelo = document.querySelector('.elevador-modelo')
const btnAndar = document.querySelectorAll('.andar-botao')
const tamanhoPiso = 50; // altura de cada andar

let andarAtual = 0;

btnAndar.forEach((button) =>{
    button.addEventListener('click', ()=>{
        const desloc = parseInt(button.dataset.floor);
        moverElevador(desloc);
        console.log(elevador.style.bottom);
    });
});

function moverElevador(andarDest){
    const distancia = (andarDest - andarAtual) * tamanhoPiso;
    console.log(distancia)
    
    elevador.style.bottom = `${distancia}px`;
    andarAtual = andarDest;
}
