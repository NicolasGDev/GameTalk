const sidebarToggle = document.querySelector(".sidebar-toggle");
const sidebar = document.querySelector(".sidebar");

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.remove("hidden");
});

document.addEventListener("click", (event) => {
    // Verificar si el clic ocurrió fuera del sidebar
    if (
        !sidebar.contains(event.target) &&
        !sidebarToggle.contains(event.target)
    ) {
        sidebar.classList.add("hidden");
    }
});
