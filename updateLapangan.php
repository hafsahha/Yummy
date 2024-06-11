<?php
include 'config.php'; // file koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_lapangan = $_POST['id_lapangan'];
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];

    $sql = "UPDATE lapangan SET Nama='$nama', Lokasi='$lokasi', Harga='$harga' WHERE ID=$id_lapangan";

    if (mysqli_query($conn, $sql)) {
        echo "Data lapangan berhasil diupdate!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
