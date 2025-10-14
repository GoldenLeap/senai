leds = document.querySelectorAll(".led");
cols = ["green", "red"];

function desligar(num){
    leds[num].classList.remove(cols[num]);
}
function ligar(num){
    leds[num].classList.add(cols[num]);
}

function control(led_num, action) {
    if(action == 'on'){
        leds[led_num -1].classList.add(cols[led_num -1]);
    }else{
        leds[led_num -1].classList.remove(cols[led_num -1]);
    }
    fetch(`/control/${led_num}/${action}`)
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Erro ao controlar o LED:', error);
        });
}

function beep(freq){
    fetch(`/control/preguica`)
}
