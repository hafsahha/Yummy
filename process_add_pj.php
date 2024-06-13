<?php
// Include file konfigurasi database
include 'config.php';

// Periksa jika metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];

    // Siapkan query untuk menambahkan data Penanggung Jawab
    $query = "INSERT INTO pj (nama, no_hp) VALUES ('$nama', '$no_hp')";

    // Jalankan query untuk menambahkan data
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Redirect kembali ke halaman utama dengan pesan sukses
        header("Location: admin.php#pj?add_pj_success=true");
        exit();
    } else {
        // Jika query gagal dijalankan, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika permintaan bukan POST, redirect ke halaman utama
    header("Location: admin.php#pj");
    exit();
}
?>
