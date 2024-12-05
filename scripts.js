// scripts.js

// Konfirmasi sebelum menghapus data
function confirmDelete(event) {
    if (!confirm("Are you sure you want to delete this record?")) {
        event.preventDefault();
    }
}

// Highlight baris tabel saat kursor berada di atasnya
document.addEventListener("DOMContentLoaded", () => {
    const rows = document.querySelectorAll("table tbody tr");
    rows.forEach((row) => {
        row.addEventListener("mouseover", () => {
            row.style.backgroundColor = "#f1f1f1";
        });
        row.addEventListener("mouseout", () => {
            row.style.backgroundColor = "";
        });
    });
});
