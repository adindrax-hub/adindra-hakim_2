document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("mahasiswaForm");
  const tableRows = document.querySelectorAll("#courseTable tbody tr");

  // 1. Logika Klik Tabel (Highlight Row)
  tableRows.forEach((row) => {
    row.addEventListener("click", () => {
      // Hapus class aktif dari semua baris
      tableRows.forEach((r) => (r.style.backgroundColor = ""));

      // Beri warna baris yang diklik
      row.style.backgroundColor = "#e7f3ff";
    });
  });

  // 2. Logika Submit Form
  form.addEventListener("submit", (event) => {
    const isDisetujui = document.getElementById("disetujui").checked;

    // Cegah pengiriman form HANYA JIKA checkbox belum dicentang
    if (!isDisetujui) {
      event.preventDefault();
      alert("Maaf, Anda harus mencentang kotak persetujuan sebelum mengirim.");
    }
  });
});
