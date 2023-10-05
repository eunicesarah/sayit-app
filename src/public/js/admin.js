console.log("hahah");
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search");
    const searchResults = document.getElementById("search-results");
    const styletable = document.querySelector(".styletable tbody");

    searchInput.addEventListener("input", debounce(function () {
        const searchQuery = searchInput.value.trim();
        if (searchQuery === "") {
            clearTable();
        } else {
            showLoader();
            fetchSearchResults(searchQuery);
        }
    }, 500));

    function fetchSearchResults(query) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `/src/backend/search.php?q=${query}`, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("ini" + xhr.responseText);
                const results = JSON.parse(xhr.responseText);
                if (results.length > 0) {
                    populateTable(results);
                } else {
                    showNoResults();
                }
            }
        };

        xhr.send();
    }

    function populateTable(results) {
        clearTable();

        results.forEach(result => {
            const row = styletable.insertRow();
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
            const cell3 = row.insertCell(2);
            const cell4 = row.insertCell(3);
            const cell5 = row.insertCell(4);
            const cell6 = row.insertCell(5);
            const cell7 = row.insertCell(6);
            const cell8 = row.insertCell(7);

            cell1.innerHTML = result.lapor_nama;
            cell2.innerHTML = result.lapor_jenis;
            cell3.innerHTML = result.lapor_lokasi;
            cell4.innerHTML = result.lapor_tanggal;
            cell5.innerHTML = result.lapor_waktu;
            cell6.innerHTML = result.lapor_kronologi;
            cell7.innerHTML = '<a href="#">View</a>';
            cell8.innerHTML = `
                <select name='lapor_status[]'>
                    <option value='pending'>Pending</option>
                    <option value='in_progress'>In Progress</option>
                    <option value='completed'>Completed</option>
                </select>
            `;
        });
    }

    function clearTable() {
        const rowCount = styletable.rows.length;
        for (let i = rowCount - 1; i > 0; i--) {
            styletable.deleteRow(i);
        }
    }

    function showNoResults() {
        clearTable();
        // Display a "No results found" message or handle it as needed.
    }

    function showLoader() {
        clearTable();
        // Display a loading message or spinner as needed.
    }

    function debounce(func, delay) {
        let timeoutId;
        return function () {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(func, delay);
        };
    }
});
