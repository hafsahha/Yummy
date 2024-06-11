<?php
// Include file function.php atau file yang berisi fungsi-fungsi yang diperlukan
include('function.php');

// Pastikan form tambah penyewa telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari formulir
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $membership = $_POST['membership'];

    // Panggil fungsi addPenyewa untuk menambahkan data penyewa baru
    $success = addPenyewa([
        'nama' => $nama,
        'no_hp' => $no_hp,
        'membership' => $membership
    ]);

    // Jika penambahan data penyewa berhasil
    if ($success) {
        // Redirect kembali ke halaman admin.php setelah menambahkan penyewa
        header("Location: admin.php");
        exit;
    } else {
        // Jika terjadi kesalahan, mungkin Anda ingin menangani dengan cara tertentu, misalnya menampilkan pesan kesalahan
        echo "Gagal menambahkan data penyewa.";
    }
} else {
    // Jika halaman ini diakses langsung tanpa melalui proses submit form, mungkin ingin melakukan redirect atau menampilkan pesan kesalahan
    echo "Halaman tidak dapat diakses langsung.";
}
?>
