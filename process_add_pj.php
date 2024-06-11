<?php
// Include file function.php atau file yang berisi fungsi-fungsi yang diperlukan
include('function.php');

// Pastikan form tambah PJ telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari formulir
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];

    // Panggil fungsi addPJ untuk menambahkan data PJ baru
    $success = addPJ([
        'nama' => $nama,
        'no_hp' => $no_hp
    ]);

    // Jika penambahan data PJ berhasil
    if ($success) {
        // Redirect kembali ke halaman admin.php setelah menambahkan PJ
        header("Location: admin.php");
        exit;
    } else {
        // Jika terjadi kesalahan, mungkin Anda ingin menangani dengan cara tertentu, misalnya menampilkan pesan kesalahan
        echo "Gagal menambahkan data PJ.";
    }
} else {
    // Jika halaman ini diakses langsung tanpa melalui proses submit form, mungkin ingin melakukan redirect atau menampilkan pesan kesalahan
    echo "Halaman tidak dapat diakses langsung.";
}
?>
