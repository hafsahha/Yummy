<?php
include 'config.php'; // file koneksi ke database

if (isset($_GET['id_lapangan'])) {
    $id_lapangan = $_GET['id_lapangan'];
    $sql = "SELECT * FROM lapangan WHERE ID = $id_lapangan";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $lapangan = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak disediakan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Lapangan</title>
</head>
<body>
    <h1>Edit Lapangan</h1>
    <form action="updateLapangan.php" method="post">
        <input type="hidden" name="id_lapangan" value="<?= $lapangan['ID'] ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $lapangan['Nama'] ?>" required><br>
        <label for="lokasi">Lokasi:</label>
        <input type="text" id="lokasi" name="lokasi" value="<?= $lapangan['Lokasi'] ?>" required><br>
        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" value="<?= $lapangan['Harga'] ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
