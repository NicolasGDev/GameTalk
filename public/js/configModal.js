const overlay = document.getElementById("overlay");
const modal = document.getElementById("modal");
const abrirBotones = document.querySelectorAll(".open-modal");
const cerrar = document.getElementById("close");
const nav = document.getElementById("nav");

// Agrega un evento a cada botón que tenga la clase "open-modal"
abrirBotones.forEach((boton) => {
    boton.addEventListener("click", (event) => {
        event.preventDefault(); // Evita el comportamiento predeterminado
        modal.classList.remove("hidden");
        overlay.classList.remove("hidden");
        nav.classList.add("hidden");
    });
});

cerrar.addEventListener("click", () => {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
});
