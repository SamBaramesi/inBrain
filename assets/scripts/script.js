const buttonR = document.getElementById("btnR");
const buttonL = document.getElementById("btnL");
const container = document.querySelector(".container");
let positionX = 0;

document.getElementById("btnL").disabled = true;

buttonR.addEventListener("click", () => {
    positionX = positionX - 100;
    container.style.transform = `translateX(${positionX}vw)`;
    if (positionX === -400) {
        document.getElementById("btnR").disabled = true;
    }
    if (positionX != 0) {
        document.getElementById("btnL").disabled = false;
    }
})

buttonL.addEventListener("click", () => {
    positionX = positionX + 100;
    container.style.transform = `translateX(${positionX}vw)`;
    if (positionX === 0) {
        document.getElementById("btnL").disabled = true;
    }
    if (positionX != - 400) {
        document.getElementById("btnR").disabled = false;
    }
})