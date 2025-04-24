let estado = 0;

function mudarLuz() {
  const luzVermelha = document.getElementById("vermelha");
  const luzLaranja = document.getElementById("laranja");
  const luzAmarela = document.getElementById("amarela");
  const luzVerde = document.getElementById("verde");

  luzVermelha.classList.remove("vermelha");
  luzLaranja.classList.remove("laranja");
  luzAmarela.classList.remove("amarela");
  luzVerde.classList.remove("verde");

  if (estado === 0) {
    luzVermelha.classList.add("vermelha");
  } else if (estado === 1) {
    luzLaranja.classList.add("laranja");
  } else if (estado === 2) {
    luzAmarela.classList.add("amarela");
  } else if (estado === 3) {
    luzVerde.classList.add("verde");
  }
  else{
    estado = -1;
  }
  estado++;
}
