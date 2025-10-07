leds = document.querySelectorAll(".led");
cols = ["green", "red"];

function desligar(num){
    leds[num].classList.remove(cols[num]);
}
function ligar(num){
    leds[num].classList.add(cols[num]);
}