console.log("hahah");

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search");
    const searchResults = document.getElementById("search-results");
    const styletable = document.querySelector(".styletable tbody");

    searchInput.addEventListener("input", debounce(function () {
        const searchQuery = searchInput.value.trim();
        if (searchQuery === "") {
            clearArticle();
        } else {
            showLoader();
            fetchSearchResults(searchQuery);
        }
    }, 500));

    function fetchSearchResults(query) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `/src/backend/search-artikel.php?q=${query}`, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const results = JSON.parse(xhr.responseText);
                if (results.length > 0) {
                    populateArticle(results);
                } else {
                    showNoResults();
                }
            }
        };

        xhr.send();
    }

    function populateArticle(results) {
  
        clearArticle();


        for (const result of results) {
            const articleElement = document.createElement("div");
            articleElement.className = "article";

            const html = `
                <a>
                    <img src="${result.article_image}">
                    <div class="article-title">${result.article_judul}</div>
                    <div class="article-date">${result.article_date}</div>
                    <div class="article-description">${result.article_content}</div>
                </a>
            `;

            articleElement.innerHTML = html;
            searchResults.appendChild(articleElement);
        }
    }

    function clearArticle() {

        searchResults.innerHTML = "";
    }

    function showNoResults() {

        searchResults.innerHTML = "<p>No results found.</p>";
    }

    function showLoader() {

        searchResults.innerHTML = "<p>Loading...</p>";
    }

    function debounce(func, delay) {
        let timeoutId;
        return function () {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(func, delay);
        };
    }
});
