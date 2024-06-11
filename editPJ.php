<?php
include 'config.php'; // file koneksi ke database

if (isset($_GET['id_pj'])) {
    $id_pj = $_GET['id_pj'];
    $sql = "SELECT * FROM pj WHERE ID = $id_pj";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $pj = mysqli_fetch_assoc($result);
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
    <title>Edit Penanggung Jawab</title>
</head>
<body>
    <h1>Edit Penanggung Jawab</h1>
    <form action="updatePJ.php" method="post">
        <input type="hidden" name="id_pj" value="<?= $pj['ID'] ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $pj['Nama'] ?>" required><br>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?= $pj['Alamat'] ?>" required><br>
        <label for="telepon">Telepon:</label>
        <input type="text" id="telepon" name="telepon" value="<?= $pj['Telepon'] ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
