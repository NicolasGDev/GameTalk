const fullscreenButton = document.getElementById("fullscreen-button");

fullscreenButton.addEventListener("click", toggleFullscreen);

function toggleFullscreen() {
    if (document.fullscreenElement) {
        // If already in fullscreen, exit fullscreen
        document.exitFullscreen();
    } else {
        // If not in fullscreen, request fullscreen
        document.documentElement.requestFullscreen();
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    dropdownToggle.addEventListener("click", function () {
        // Alternar la clase 'hidden' para mostrar u ocultar el menú
        dropdownMenu.classList.toggle("hidden");
    });

    // Cerrar el menú si se hace clic fuera de él
    document.addEventListener("click", function (event) {
        if (
            !dropdownToggle.contains(event.target) &&
            !dropdownMenu.contains(event.target)
        ) {
            dropdownMenu.classList.add("hidden");
        }
    });
});
