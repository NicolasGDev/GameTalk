const nav = document.getElementById("nav");
let btnCerrar = document.getElementById("cerrar");
let btnAbrir = document.getElementById("abrir");

if (btnAbrir && btnCerrar) {
    btnAbrir.addEventListener("click", () => {
        nav.classList.remove("hidden");
        console.log("hola");
    });

    btnCerrar.addEventListener("click", () => {
        nav.classList.add("hidden");
        console.log("hola");
    });
}
