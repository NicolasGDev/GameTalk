document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".report-button");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Evita el envío del formulario por defecto.

            const form = this.closest(".report-form");

            Swal.fire({
                title: "Reportar comentario",
                text: "El comentario será enviado a revisión.",
                icon: "warning",
                color: "#FFFFFF",
                iconColor: "#FACC15",
                background: "#1F2937",
                showCancelButton: true,
                confirmButtonColor: "#2563EB",
                cancelButtonColor: "#d33",
                confirmButtonText: "Reportar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Reportado!",
                        icon: "success",
                        background: "#1F2937",
                        color: "#FFFFFF",
                    });
                    setTimeout(() => {
                        form.submit(); // Enviar el formulario después de la confirmación.
                    }, 500);
                } else {
                    console.log("Reporte cancelado.");
                }
            });
        });
    });
});
