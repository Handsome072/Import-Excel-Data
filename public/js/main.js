// script Pagination
let currentPage = 0;
const rowsPerPage = 7;
const totalColumns = document.getElementById('excelTable').querySelector('tr').children.length;

function showColumns(page) {
    const startColumn = page * rowsPerPage;
    const endColumn = Math.min(startColumn + rowsPerPage, totalColumns);
    const tableRows = document.getElementById('excelTable').querySelectorAll('tr');
    tableRows.forEach(row => {
        const cells = row.children;
        for (let i = 0; i < cells.length; i++) {
            if ((i >= startColumn && i < endColumn) || (cells[i].classList.contains('actions-column'))) {
                cells[i].style.display = '';
            } else {
                cells[i].style.display = 'none';
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    showColumns(currentPage);

    document.getElementById('nextButton').addEventListener('click', function () {
        if ((currentPage + 1) * rowsPerPage < totalColumns) {
            currentPage++;
            showColumns(currentPage);
        }
    });

    document.getElementById('prevButton').addEventListener('click', function () {
        if (currentPage > 0) {
            currentPage--;
            showColumns(currentPage);
        }
    });

});

// script De Tri
document.addEventListener('DOMContentLoaded', function () {
    function sortTable(columnIndex, sortOrder) {
        const tableBody = document.querySelector('#excelTable tbody');
        const rows = Array.from(tableBody.querySelectorAll('tr'));
        rows.sort((rowA, rowB) => {
            const cellA = rowA.querySelectorAll('td')[columnIndex].textContent.trim();
            const cellB = rowB.querySelectorAll('td')[columnIndex].textContent.trim();

            if (sortOrder === 'asc') {
                return cellA.localeCompare(cellB);
            } else {
                return cellB.localeCompare(cellA);
            }
        });

        tableBody.innerHTML = '';
        rows.forEach(row => {
            tableBody.appendChild(row);
        });
    }
    const headers = document.querySelectorAll('#excelTable th');
    headers.forEach((header, index) => {
        header.addEventListener('click', function () {
            const currentSort = this.getAttribute('data-sort');
            const newSort = currentSort === 'asc' ? 'desc' : 'asc';
            this.setAttribute('data-sort', newSort);
            sortTable(index, newSort);
        });
    });
});

// script De Recherche
document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');
    searchForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const searchTerm = searchInput.value.trim().toLowerCase();
        const tableRows = document.querySelectorAll('#excelTable tbody tr');

        let found = false;

        tableRows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let rowFound = false;

            cells.forEach(cell => {
                if (cell.textContent.trim().toLowerCase().includes(searchTerm)) {
                    row.style.display = '';
                    rowFound = true;
                    found = true;
                }
            });

            if (!rowFound) {
                row.style.display = 'none';
            }
        });

        if (!found) { 
            document.getElementById('noResultsMessage').style.display = '';
        } else { 
            document.getElementById('noResultsMessage').style.display = 'none';
        }
    });
});
