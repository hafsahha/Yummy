<?php
include 'config.php'; // file koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST['ID'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];

    $sql = "UPDATE pj SET Nama='$nama', Alamat='$alamat', Telepon='$telepon' WHERE ID=$id_pj";

    if (mysqli_query($conn, $sql)) {
        echo "Data Penanggung Jawab berhasil diupdate!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
