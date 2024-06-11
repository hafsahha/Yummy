<?php
// Include file function.php atau file yang berisi fungsi-fungsi yang diperlukan
include('function.php');

// Pastikan form tambah fasilitas telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari formulir
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $harga = $_POST['harga'];

    // Panggil fungsi addFasilitas untuk menambahkan fasilitas baru
    $success = addFasilitas([
        'nama_fasilitas' => $nama_fasilitas,
        'harga' => $harga
    ]);

    // Jika penambahan fasilitas berhasil
    if ($success) {
        // Redirect kembali ke halaman admin.php setelah menambahkan fasilitas
        header("Location: admin.php");
        exit;
    } else {
        // Jika terjadi kesalahan, mungkin Anda ingin menangani dengan cara tertentu, misalnya menampilkan pesan kesalahan
        echo "Gagal menambahkan fasilitas.";
    }
} else {
    // Jika halaman ini diakses langsung tanpa melalui proses submit form, mungkin ingin melakukan redirect atau menampilkan pesan kesalahan
    echo "Halaman tidak dapat diakses langsung.";
}
?>
