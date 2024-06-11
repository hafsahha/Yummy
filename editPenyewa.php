<?php
include 'config.php'; // file koneksi ke database

if (isset($_GET['id_penyewa'])) {
    $id_penyewa = $_GET['id_penyewa'];
    $sql = "SELECT * FROM penyewa WHERE ID = $id_penyewa";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $penyewa = mysqli_fetch_assoc($result);
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
    <title>Edit Penyewa</title>
</head>
<body>
    <h1>Edit Penyewa</h1>
    <form action="updatePenyewa.php" method="post">
        <input type="hidden" name="id_penyewa" value="<?= $penyewa['ID'] ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $penyewa['Nama'] ?>" required><br>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?= $penyewa['Alamat'] ?>" required><br>
        <label for="telepon">Telepon:</label>
        <input type="text" id="telepon" name="telepon" value="<?= $penyewa['Telepon'] ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
