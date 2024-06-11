<?php
// Include file function.php atau file yang berisi fungsi-fungsi yang diperlukan
include('function.php');

// Pastikan form tambah lapangan telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari formulir
    $jenis_lapangan = $_POST['jenis_lapangan'];
    $jenis_olahraga = $_POST['jenis_olahraga'];
    $fasilitas_umum = $_POST['fasilitas_umum'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $gambar = $_FILES['gambar']['name'];
    $ID_PJ = $_POST['ID_PJ']; // Ambil ID PJ dari formulir

    // Proses upload gambar
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $target_dir = 'assets/img/lapangan/'. $gambar;
    $isMoved = move_uploaded_file($gambar_tmp, $target_dir);

    // Simpan informasi lapangan ke dalam database
    $success = addLapangan([
        'jenis_lapangan' => $jenis_lapangan,
        'jenis_olahraga' => $jenis_olahraga,
        'fasilitas_umum' => $fasilitas_umum,
        'harga' => $harga,
        'status' => $status,
        'ID_PJ' => $ID_PJ, // Gunakan ID PJ langsung
        'gambar' => $gambar // Gunakan nama file gambar yang baru
    ]);

    // Jika penyimpanan berhasil
    if ($success && $isMoved) {
        // Redirect kembali ke halaman admin.php setelah menambahkan lapangan
        header("Location: admin.php");
        exit;
    } else {
        // Jika terjadi kesalahan, mungkin Anda ingin menangani dengan cara tertentu, misalnya menampilkan pesan kesalahan
        echo "Gagal menambahkan lapangan atau mengunggah gambar.";
    }
} else {
    // Jika halaman ini diakses langsung tanpa melalui proses submit form, mungkin ingin melakukan redirect atau menampilkan pesan kesalahan
    echo "Halaman tidak dapat diakses langsung.";
}
?>
