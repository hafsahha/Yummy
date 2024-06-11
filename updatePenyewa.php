<?php
include 'config.php'; // file koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_penyewa = $_POST['id_penyewa'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = "UPDATE penyewa SET Nama='$nama', Alamat='$alamat', Telepon='$telepon' WHERE ID=$id_penyewa";

    if (mysqli_query($conn, $sql)) {
        echo "Data penyewa berhasil diupdate!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
