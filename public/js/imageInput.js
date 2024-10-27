// Seleccionamos los elementos del DOM
const uploadInput = document.getElementById("upload");
const filenameLabel = document.getElementById("filename");
const imagePreview = document.getElementById("image-preview");

// Añadir event listener al input file para mostrar el nombre del archivo seleccionado
uploadInput.addEventListener("change", (event) => {
    const file = event.target.files[0];

    if (file) {
        // Mostrar el nombre del archivo seleccionado
        filenameLabel.textContent = `Archivo seleccionado: ${file.name}`;
    } else {
        // Restaurar el texto si no hay ningún archivo seleccionado
        filenameLabel.textContent = "No se ha seleccionado ningún archivo";
    }
});

// Añadir un evento de click al contenedor, solo si no es directamente el input
imagePreview.addEventListener("click", (event) => {
    // Verificamos si el clic no ocurrió directamente sobre el input
    if (event.target !== uploadInput) {
        uploadInput.click();
    }
});
