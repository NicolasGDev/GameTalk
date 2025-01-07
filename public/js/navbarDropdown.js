//Dropdown de opciones navbar desktop
document.querySelectorAll(".profileDropdown").forEach((dropdown) => {
    const menu = dropdown.nextElementSibling;

    dropdown.addEventListener("click", function (e) {
        e.stopPropagation();
        menu.classList.toggle("hidden");
    });

    document.addEventListener("click", function (e) {
        if (!dropdown.contains(e.target)) {
            menu.classList.add("hidden");
        }
    });
});
