// Carrusel de cartas "Conocenos"
const cartas = document.querySelectorAll(".carta");
const izquierdaBtn = document.querySelector(".flecha.izquierda");
const derechaBtn = document.querySelector(".flecha.derecha");

let indexCentral = 1;

function updatePositions() {
  cartas.forEach((carta) => {
    carta.classList.remove("pos-izquierda", "pos-centro", "pos-derecha");
    carta.style.opacity = "0";
  });

  const total = cartas.length;
  const izq = (indexCentral - 1 + total) % total;
  const der = (indexCentral + 1) % total;

  cartas[indexCentral].classList.add("pos-centro");
  cartas[izq].classList.add("pos-izquierda");
  cartas[der].classList.add("pos-derecha");

  cartas[indexCentral].style.opacity = "1";
  cartas[izq].style.opacity = "1";
  cartas[der].style.opacity = "1";
}

izquierdaBtn.addEventListener("click", () => {
  indexCentral = (indexCentral - 1 + cartas.length) % cartas.length;
  updatePositions();
});

derechaBtn.addEventListener("click", () => {
  indexCentral = (indexCentral + 1) % cartas.length;
  updatePositions();
});

updatePositions();

// Contador de descuentos
function iniciarContador() {
  const fechaFinal = new Date();
  fechaFinal.setDate(fechaFinal.getDate() + 7);

  const contadorEl = document.getElementById("contador");

  function actualizarContador() {
    const ahora = new Date().getTime();
    const distancia = fechaFinal - ahora;

    const dias = Math.floor(distancia / (1000 * 60 * 60 * 24));
    const horas = Math.floor(
      (distancia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    const minutos = Math.floor((distancia % (1000 * 60 * 60)) / (1000 * 60));
    const segundos = Math.floor((distancia % (1000 * 60)) / 1000);

    contadorEl.textContent = `${dias}d ${horas}h ${minutos}m ${segundos}s`;
  }

  actualizarContador();
  setInterval(actualizarContador, 1000);
}

iniciarContador();
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
