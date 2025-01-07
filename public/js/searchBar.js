document.addEventListener("DOMContentLoaded", () => {
    const searchBar = document.getElementById("searchBar");
    const resultsContainer = document.getElementById("results");
    const allNews = Array.from(document.querySelectorAll(".post-item")); // Obtén todos los elementos originales.

    searchBar.addEventListener("input", (e) => {
        const query = e.target.value.toLowerCase(); // Obtén el valor del input en minúsculas.

        // Filtrar las noticias que coincidan con la consulta.
        const filteredNews = allNews.filter((newsItem) => {
            const title = newsItem
                .querySelector("h3")
                .textContent.toLowerCase();
            return title.includes(query);
        });

        // Limpia el contenedor y muestra solo los resultados filtrados.
        resultsContainer.innerHTML = "";
        filteredNews.forEach((newsItem) => {
            resultsContainer.appendChild(newsItem);
        });

        // Si no hay resultados, muestra un mensaje.
        if (filteredNews.length === 0) {
            resultsContainer.innerHTML = `
<p class="text-white text-center">No se encontraron resultados.</p>
`;
        }
    });
});
