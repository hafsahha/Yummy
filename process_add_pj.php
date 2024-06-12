<?php
// Include file konfigurasi database
include 'config.php';

// Periksa jika metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai ID PJ dari formulir
    $id_pj = $_POST['id_pj'];

    // Ambil data lainnya dari formulir
    $nama_pj = $_POST['nama_pj'];
    $no_hp_pj = $_POST['no_hp_pj'];

    // Siapkan query untuk mengupdate data Penanggung Jawab
    $query = "UPDATE pj SET nama = '$nama_pj', no_hp = '$no_hp_pj' WHERE ID = $id_pj";

    // Jalankan query untuk mengupdate data
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Redirect kembali ke halaman utama dengan pesan sukses
        header("Location: index.php#pj?edit_pj_success=true");
        exit();
    } else {
        // Jika query gagal dijalankan, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika permintaan bukan POST, redirect ke halaman utama
    header("Location: index.php#pj");
    exit();
}
?>
