<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ID'];
    $jenis_lapangan = $_POST['jenis_lapangan'];
    $jenis_olahraga = $_POST['jenis_olahraga'];
    $fasilitas_umum = $_POST['fasilitas_umum'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $id_pj = $_POST['ID_PJ'];

    // Tangkap file gambar yang diunggah
    $nama_gambar = $_FILES['gambar']['name'];
    $ukuran_gambar = $_FILES['gambar']['size'];
    $tmp_gambar = $_FILES['gambar']['tmp_name'];

    // Tentukan lokasi penyimpanan file gambar
    $lokasi_gambar = 'assets/img/lapangan/' . $nama_gambar;

    // Lakukan update data lapangan ke database
    $sql = "UPDATE lapangan SET jenis_lapangan='$jenis_lapangan', jenis_olahraga='$jenis_olahraga', fasilitas_umum='$fasilitas_umum', harga='$harga', status='$status', ID_PJ='$id_pj', gambar='$nama_gambar' WHERE ID='$id'";

    if (mysqli_query($conn, $sql)) {
        // Pindahkan file gambar ke lokasi penyimpanan
        move_uploaded_file($tmp_gambar, $lokasi_gambar);

        // Redirect ke halaman utama dengan pesan sukses
        header("location: admin.php?pesan=sukses");
        exit;
    } else {
        // Redirect ke halaman utama dengan pesan gagal
        header("location: admin.php?pesan=gagal");
        exit;
    }
} else {
    // Jika metode request bukan POST, redirect ke halaman utama
    header("location: admin.php");
    exit;
}
?>
