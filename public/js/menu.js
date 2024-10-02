document.addEventListener("DOMContentLoaded", function () {
    const element = document.querySelector("#miElemento"); // Asegúrate de que el selector sea correcto
    const nav = document.getElementById("nav");
    let btnCerrar = document.querySelector(".cerrar");
    let btnAbrir = document.querySelector(".abrir");

    btnAbrir.addEventListener("click", () => {
        nav.classList.remove("hidden");
        console.log("hola");
    });

    btnCerrar.addEventListener("click", () => {
        nav.classList.add("hidden");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const element = document.querySelector("#miElemento"); // Reemplaza por el selector correcto
    if (element) {
        element.addEventListener("click", function () {
            // Tu código aquí
        });
    }
});
