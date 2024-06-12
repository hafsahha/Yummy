<?php
// Include file konfigurasi database atau file lain yang diperlukan
include 'config.php';

// Cek apakah permintaan dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirim melalui formulir
    $id_fasilitas = $_POST['ID'];
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $harga_fasilitas = $_POST['harga_fasilitas'];

    // Query SQL untuk mengupdate data fasilitas berdasarkan ID
    $sql = "UPDATE fasilitas SET nama_fasilitas='$nama_fasilitas', harga='$harga_fasilitas' WHERE ID='$id_fasilitas'";

    // Eksekusi query dan periksa apakah berhasil
    if (mysqli_query($conn, $sql)) {
        // Redirect ke halaman utama dengan pesan sukses jika berhasil
        header("location: admin.php?pesan=sukses");
        exit;
    } else {
        // Redirect ke halaman utama dengan pesan gagal jika terjadi kesalahan
        header("location: admin.php?pesan=gagal");
        exit;
    }
} else {
    // Redirect ke halaman utama jika permintaan tidak dikirim melalui metode POST
    header("location: admin.php");
    exit;
}
?>
