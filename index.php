<?php
// ==========================================
// 1. KONEKSI KE DATABASE
// ==========================================
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_praktikum_ummi";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ==========================================
// 2. LOGIKA PENYIMPANAN DATA
// ==========================================
$pesan = "";
if (isset($_POST['submit_pengajuan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $disetujui = isset($_POST['disetujui']) ? 1 : 0;

    $query = "INSERT INTO pengajuan_rps (nama_lengkap, tanggal_pengajuan, is_disetujui) 
              VALUES ('$nama', '$tanggal', '$disetujui')";

    if (mysqli_query($conn, $query)) {
        $pesan = "<p style='color: green; font-weight: bold; background: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px;'>Berhasil! Pengajuan RPS $nama telah disimpan ke database.</p>";
    } else {
        $pesan = "<p style='color: red; background: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 15px;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 1 - Pengajuan RPS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Portal Praktikum Mahasiswa</h1>
        <p>Sistem Informasi Akademik Sederhana - Teknik Informatika UMMI</p>
    </header>

    <main>
        <section class="content-section">
            <h2>Pengajuan RPS Semester 3</h2>
            
            <?php echo $pesan; ?>
            
            <p>Silakan periksa jadwal kuliah di bawah ini dan isi form pengajuan untuk konfirmasi rencana studi Anda.</p>
            
            <div class="image-container">
                <img src="ummi.jpg" alt="Kampus UMMI Sukabumi" class="main-img">
            </div>
        </section>

        <section class="table-section">
            <h2>Jadwal Kuliah</h2>
            <div class="table-container">
                <table id="courseTable"> 
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Pemrograman Web</td><td>3</td><td>Pak Ahmad</td></tr>
                        <tr><td>2</td><td>Sistem Operasi</td><td>3</td><td>Bu Susi</td></tr>
                        <tr><td>3</td><td>Basis Data</td><td>4</td><td>Pak Budi</td></tr>
                        <tr><td>4</td><td>Web Dasar</td><td>4</td><td>Pak Hamid</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="hint">* Klik pada baris tabel untuk menandai baris.</p>
        </section>

        <section class="form-section">
            <h2>Form Pengajuan Mahasiswa</h2>
            <form id="mahasiswaForm" method="POST" action="">
                <div class="input-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama sesuai KTM" required>
                </div>
                
                <div class="input-group">
                    <label for="tanggal">Tanggal Pengajuan:</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="disetujui" name="disetujui">
                    <label for="disetujui">Saya menyatakan bahwa RPS ini telah disetujui</label>
                </div>

                <button type="submit" name="submit_pengajuan" id="btnKirim">Kirim Pengajuan</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Teknik Informatika - UMMI</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>